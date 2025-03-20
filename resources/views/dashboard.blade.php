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
        @livewire('dashboard-editor')
        <header class="header d-flex justify-between">  
            <div>
                <button id="toggle-left-sidebar" class="btn bg-white ms-5">
                    <img src="https://img.icons8.com/?size=100&id=36389&format=png&color=000000" alt="" class="w-6 h-6">
                </button>  
            </div> 
            <div>
                <button id="save-layout" class="btn btn-success save-layout mt-3">Salvar Layout</button>
                <button id="toggle-sidebar" class="btn btn-primary sidebar-toggle">Adicionar Widgets</button>
                <button id="personalize" class="btn btn-primary sidebar-toggle-2">Editar</button>
                <button id="reset-layout" class="btn btn-danger p-2">Resetar Layout</button>
            </div>
        </header>
        <div id="sidebar" class="right-sidebar" wire:ignore>
            <h5>Personalizar Layout</h5>
            <p>Arraste os blocos para o dashboard.</p>
            <button id="close-sidebar" class="btn btn-primary mb-3 mt-3 sidebar-toggle">fechar</button>
            @livewire('search-bar')
            <div id="right-sidebar" class="grid-stack">
                <div class="grid-stack-item" data-widget="noticias" gs-w="12" gs-h="6" gs-x="0" gs-y="0" data-widget-index="noticias">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        <h1>Noticias</h1>
                    </div>
                </div>
                <div class="grid-stack-item" data-widget="avisos" gs-w="12" gs-h="6" gs-x="0" gs-y="6" data-widget-index="avisos">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        <h1>Avisos</h1>
                    </div>
                </div>
                <div class="grid-stack-item" data-widget="feed" gs-w="12" gs-h="6" gs-x="0" gs-y="12" data-widget-index="feed">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        <h1>Feed</h1>
                    </div>
                </div>
                <div class="grid-stack-item" data-widget="wdiget" gs-w="12" gs-h="6" gs-x="0" gs-y="18" data-widget-index="widget">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        <h1>Exemplo</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let dashboardItems = document.querySelectorAll('#main-dashboard .grid-stack-item');

            const defaultLayout = [
                { x: 9, y: 12, w: 3, h: 6, widgetIndex: 'noticias' },
                { x: 9, y: 6, w: 3, h: 6, widgetIndex: 'avisos' },
                { x: 0, y: 0, w: 9, h: 18, widgetIndex: 'feed' },
                { x: 9, y: 0, w: 3, h: 6, widgetIndex: 'widget' }
            ];
console.log(defaultLayout);

            
            function resetLayout() {// Função para restaurar o layout
                Livewire.dispatch('saveLayout', [defaultLayout]);
                setTimeout(() => {
                    location.reload();
                }, 500);
            }

            function getLivewireComponent(widgetIndex) {// Retorna o componente Livewire correspondente ao widgetIndex
                switch (widgetIndex) {
                    case 'noticias':
                        return `@livewire('noticias')`;
                    case 'avisos':
                        return `@livewire('avisos')`;
                    case 'feed':
                        return `@livewire('feeds')`;
                    case 'widget':
                        return `@livewire('widgets-ex')`;
                    default:
                        return '';
                }
            }

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
                minRow: 3,
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
            
            const saveBtn = document.getElementById('save-layout');
            const sidebar = document.getElementById('sidebar');
            const leftSidebar = document.getElementById('left-sidebar');
            const toggleButton = document.getElementById('toggle-sidebar');
            const toggleLeftSidebar = document.getElementById('toggle-left-sidebar');            
            const personalizeBtn = document.getElementById('personalize');
            const closeSidebar = document.getElementById('close-sidebar');
            const resetLayoutBtn = document.getElementById('reset-layout');
            let isEditing = false;

            resetLayoutBtn.addEventListener('click', resetLayout);

            closeSidebar.addEventListener('click', function(){
                const isActive = sidebar.classList.toggle('active');
            })
            
            toggleLeftSidebar.addEventListener('click', function(){
                leftSidebar.classList.toggle('active')
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

            document.addEventListener('click', function (event) { //função para habilitar a função de remoção de widget do dashboard para a sidebar
                if (event.target.classList.contains('remove-widget')) {
                    let widget = event.target.closest('.grid-stack-item');
                    let widgetIndex = widget.dataset.widgetIndex;

                    widget.style.display = 'none';                    

                    let sidebarItem = document.createElement('div');
                    sidebarItem.className = 'grid-stack-item';
                    sidebarItem.setAttribute('data-widget-index', widgetIndex);
                    sidebarItem.setAttribute('gs-w', '12');
                    sidebarItem.setAttribute('gs-h', '6');
                    sidebarItem.setAttribute('gs-x', '0');
                    sidebarItem.setAttribute('gs-y', '0');
                    sidebarItem.innerHTML = `
                        <div class="grid-stack-item-content bg-light p-3 border">
                            <h1>${widgetIndex}</h1>
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
        
            dashboard.on('added', function (event, items) { //função para inicializar os widgets quando adicionados ao dashboard
                dashboard.batchUpdate();

                items.forEach((item) => {
                    let widgetIndex = item.el.dataset.widgetIndex;
                    
                    if (widgetIndex) { //transforma o widget padrao em um conteudo livewire quando arrastado
                        let livewireComponent = getLivewireComponent(widgetIndex);
                        item.el.querySelector('.grid-stack-item-content').innerHTML = livewireComponent;
                    }
                });

                dashboard.commit();
            });

            dashboard.on('change', function (event, items) { //função para atualizar o layout toda vez que houver qualquer mudança nos widgets
                let layout = dashboard.save();

                layout.forEach(item => {
                    let node = dashboard.engine.nodes.find(n => 
                        n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                    );

                    if (node && !item.widgetIndex && node.el) {                         
                        item.widgetIndex = node.el.dataset.widgetIndex || null;
                    }
                });
                console.log(layout);
                saveBtn.addEventListener('click', function () {
                    Livewire.dispatch('saveLayout', [layout]);
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                });
            });

            const widgetSizes = { //pre-definição de dimensoes dos widgets
                noticias: { w: 3, h: 5 },
                avisos: { w: 3, h: 5 },
                feed: { w: 9, h: 18, },
                widget: { w: 3, h: 5, },
            };

            dashboard.on('drag', function (event, item) { //função para atualizar as dimensoes dos widgets em tempo real
                let widgetIndex = item.getAttribute('data-widget-index'); 
                if (!widgetIndex) return; 
                
                let { w: newWidth, h: newHeight } = widgetSizes[widgetIndex] || { w: 3, h: 5 };

                let itemX = parseInt(item.getAttribute('gs-x'));
                let itemY = parseInt(item.getAttribute('gs-y'));

                let node = dashboard.engine.nodes.find(n => n.x == itemX && n.y == itemY);
                
                if (node) {
                    node.w = newWidth;
                    node.h = newHeight;
                    node.widgetIndex = widgetIndex;

                    dashboard.update(node.el, { w: newWidth, h: newHeight, widgetIndex: widgetIndex });
                    dashboard.commit();
                }
            });
        });
    </script>
</body>
</html>
