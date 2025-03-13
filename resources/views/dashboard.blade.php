<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Personalizável</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gridstack.js/11.2.0/gridstack.min.css" integrity="sha512-KAu0PHHBy9kkFY2fkQ7+RNHftQuJ+DB2Rb39LM28TKfzu+nzPIrC4TKtiZsq/3iP+ZTfV7O8cUGNl6VZvCg6Ag==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                @livewire('dashboard-editor')
            </div>
        </div>
        <header class="header">
            <button id="save-layout" class="btn btn-success save-layout mt-3">Salvar Layout</button>
            <button id="toggle-sidebar" class="btn btn-primary sidebar-toggle">Adicionar Widgets</button>
            <button id="personalize" class="btn btn-primary sidebar-toggle-2">Editar</button>
        </header>
        <div id="sidebar" class="right-sidebar">
            <h5>Personalizar Layout</h5>
            <p>Arraste os blocos para o dashboard.</p>
            <button id="close-sidebar" class="btn btn-primary mb-3 mt-3 sidebar-toggle">fechar</button>

            <div id="right-sidebar" class="grid-stack">
                <div class="grid-stack-item" data-widget="noticias" gs-w="12" gs-h="6" gs-x="0" gs-y="0" data-widget-index="noticias">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        @livewire('noticias')
                    </div>
                </div>
                <div class="grid-stack-item" data-widget="avisos" gs-w="12" gs-h="6" gs-x="0" gs-y="6" data-widget-index="avisos">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        @livewire('avisos')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let dashboardItems = document.querySelectorAll('#main-dashboard .grid-stack-item');

            dashboardItems.forEach((item) => { //função para nao permitir duplicação de widget
                let widgetIndex = item.dataset.widgetIndex;
                
                if (widgetIndex) {
                    let sidebarItem = document.querySelector(`#right-sidebar .grid-stack-item[data-widget-index="${widgetIndex}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }
                }
            });

            let dashboard = GridStack.init({ //inicializa o grid do dashboard
                cellHeight: 100,
                minRow: 10,
                acceptWidgets: true,
                float: true,
                disableResize: true,
                disableDrag: true
            }, '#main-dashboard');

            let sidebarGrid = GridStack.init({ //inicializa o grid da sidebar
                float: true,
                disableResize : true,
                acceptWidgets: true,
            }, '#right-sidebar');

            GridStack.setupDragIn('#right-sidebar .grid-stack-item', { appendTo: 'body', helper: 'clone' }); //permite arrastar de um grid para outro

            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.getElementById('toggle-sidebar');
            const personalizeBtn = document.getElementById('personalize');
            const closeSidebar = document.getElementById('close-sidebar');
            let isEditing = false;

            closeSidebar.addEventListener('click', function(){
                const isActive = sidebar.classList.toggle('active');
            })
            
            toggleButton.addEventListener('click', function () {
                const isActive = sidebar.classList.toggle('active');

                if (isActive) {
                    dashboard.enable(); 
                    dashboard.enableMove(true);
                    dashboard.enableResize(true); 
                } else {
                    dashboard.disable(); 
                    dashboard.enableMove(false);
                    dashboard.enableResize(false); 
                }
            });

            personalizeBtn.addEventListener('click', function () {
                if (!isEditing) {
                    dashboard.enable(); 
                    dashboard.enableMove(true); 
                    dashboard.enableResize(true); 
                    dashboard.float(true); 
                    personalizeBtn.textContent = 'Finalizar Edição'; 
                } else {
                    dashboard.disable(); 
                    dashboard.enableMove(false); 
                    dashboard.enableResize(false); 
                    dashboard.float(false); 
                    personalizeBtn.textContent = 'Editar';
                }
                isEditing = !isEditing;
            });

            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-widget')) {
                    let widget = event.target.closest('.grid-stack-item');
                    let widgetIndex = widget.dataset.widgetIndex;

                    dashboard.removeWidget(widget, true);

                    let sidebarItem = document.createElement('div');
                    sidebarItem.className = 'grid-stack-item';
                    sidebarItem.setAttribute('data-widget-index', widgetIndex);
                    sidebarItem.setAttribute('gs-w', '12');
                    sidebarItem.setAttribute('gs-h', '6');
                    sidebarItem.setAttribute('gs-x', '0');
                    sidebarItem.setAttribute('gs-y', '0');
                    sidebarItem.innerHTML = `
                        <div class="grid-stack-item-content bg-light p-3 border">
                            ${widget.querySelector('.grid-stack-item-content').innerHTML}
                        </div>
                    `;

                    document.getElementById('right-sidebar').appendChild(sidebarItem);

                    sidebarGrid.makeWidget(sidebarItem);

                    dashboard.batchUpdate(); 
                    dashboard.engine.nodes = dashboard.engine.nodes.filter(node => node.el !== widget); 
                    dashboard.commit(); 

                    let layout = dashboard.save(); 
                    const finalLayout = layout.map(item => {
                        let node = dashboard.engine.nodes.find(n => 
                            n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                        );
                        
                        if (node) {
                            item.widgetIndex = node.el.dataset.widgetIndex;                        
                        }

                        return item;
                    });

                    console.log(finalLayout);

                    saveBtn.addEventListener('click', function () {
                        Livewire.dispatch('saveLayout', [finalLayout]);
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    });
                }
            });

            const saveBtn = document.getElementById('save-layout');
        
            dashboard.on('added', function (event, items) { 
                dashboard.batchUpdate();

                items.forEach((item) => {
                    let widgetIndex = item.el.dataset.widgetIndex;
                    
                    if (widgetIndex) {
                        item.el.gridstackNode.widgetIndex = widgetIndex;
                        dashboard.update(item.el, { widgetIndex: widgetIndex });
                    }
                });

                dashboard.commit();
            });

            dashboard.on('change', function (event, items) { 
                let layout = dashboard.save();

                layout.forEach(item => {
                    let node = dashboard.engine.nodes.find(n => 
                        n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                    );

                    if (node && !item.widgetIndex && node.el) {                         
                        item.widgetIndex = node.el.dataset.widgetIndex || null;
                    }
                });

                saveBtn.addEventListener('click', function () {
                    Livewire.dispatch('saveLayout', [layout]);
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                }); 
            });

            dashboard.on('drag', function (event, item) { 
                let newWidth = 3;  
                let newHeight = 3;
                
                let itemX = parseInt(item.getAttribute('gs-x'));
                let itemY = parseInt(item.getAttribute('gs-y'));
                
                let node = dashboard.engine.nodes.find(n => n.x == itemX && n.y == itemY);
                
                if (node) {
                    let widgetIndex = item.getAttribute('data-widget-index'); 
                    node.w = newWidth;
                    node.h = newHeight;
                    node.widgetIndex = widgetIndex;

                    dashboard.update(node, { w: newWidth, h: newHeight, widgetIndex: widgetIndex });
                    
                    dashboard.commit();
                }
            });    
        });
    </script>
</body>
</html>
