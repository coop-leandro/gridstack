<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Personalizável</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gridstack.js/11.2.0/gridstack.min.css" integrity="sha512-KAu0PHHBy9kkFY2fkQ7+RNHftQuJ+DB2Rb39LM28TKfzu+nzPIrC4TKtiZsq/3iP+ZTfV7O8cUGNl6VZvCg6Ag==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
<body>   
        @livewire('dashboard-editor')
        <header class="header d-flex justify-between align-items-center px-4 py-3 bg-light shadow-sm rounded-3">
            <div class="d-flex align-items-center">
                <button id="toggle-left-sidebar" class="btn bg-white border-0 rounded-circle ms-3 p-2 shadow-sm">
                    <img src="https://img.icons8.com/?size=100&id=36389&format=png&color=000000" alt="Ícone de Menu" class="w-6 h-6">
                </button>  
            </div>
            <div class="d-flex align-items-center gap-3">
                @if ($isManager)
                    <div class="btn-container">
                        <button id="set-default" class="btn btn-outline-secondary save-layout p-2">Setar Default</button>
                    </div>
                @endif
                @if (!$isManager)
                    <div class="btn-container">
                        <button id="save-layout" class="btn btn-primary save-layout p-2">Salvar Layout</button>
                    </div>
                @endif
        
                <div class="btn-container">
                    <button id="toggle-sidebar" class="btn btn-primary sidebar-toggle p-2">Adicionar Widgets</button>
                </div>
        
                <div class="btn-container">
                    <button id="personalize" class="btn btn-primary sidebar-toggle-2 p-2">Editar</button>
                </div>
        
                <div class="btn-container">
                    <button id="reset-layout" class="btn btn-danger p-2">Resetar Layout</button>
                </div>    

            </div>
        </header>
        
        <div id="sidebar" class="right-sidebar" wire:ignore>
            <h5>Personalizar Layout</h5>
            <p>Arraste os blocos para o dashboard.</p>
            <button id="close-sidebar" class="btn btn-primary mb-3 mt-3 sidebar-toggle">fechar</button>
            @livewire('search-bar')
            <div id="right-sidebar" class="grid-stack">
                {{-- <div class="grid-stack-item" data-widget="noticias" gs-w="12" gs-h="18" gs-x="0" gs-y="0" data-widget-index="noticias">
                    <div class="grid-stack-item-content border">
                        <h1>Noticias</h1>
                    </div>
                </div> --}}
                <div class="grid-stack-item" data-locked-from-sector data-widget="avisos" gs-w="12" gs-h="18" gs-x="0" gs-y="0" data-widget-index="avisos">
                    <div class="grid-stack-item-content bg-light border">
                        <div class="w-[220px] h-[400px] p-3 rounded-lg">
                            <h1 class="text-[20px] font-bold mb-4">Avisos Gerais</h1>
                            
                            <p class="text-[15px] mb-4">
                                Regras para uso dos recados clique <a href="#" class="text-blue-500 hover:underline">aqui</a>.
                            </p>
                        
                            <div class="space-y-4">
                                <div class="flex items-start space-x-2">
                                    <div>
                                        <p class="text-[15px] font-semibold">Usuário em 24/02/2025 às 14:42</p>
                                        <p class="text-[15px] text-gray-700">
                                            Filial 31 estará fechada no dia 25/02/2025 devido ao feriado municipal...
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-4 border-gray-300">
                    
                                <div class="flex items-start space-x-2">
                                    <div>
                                        <p class="text-[15px] font-semibold">Usuário em 24/02/2025 às 14:42</p>
                                        <p class="text-[15px] text-gray-700">
                                            Filial 31 estará fechada no dia 25/02/2025 devido ao feriado municipal...
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-4 border-gray-300">
                    
                                <div class="flex items-start space-x-2">
                                    <div>
                                        <p class="text-[15px] font-semibold">Usuário em 24/02/2025 às 14:42</p>
                                        <p class="text-[15px] text-gray-700">
                                            Filial 31 estará fechada no dia 25/02/2025 devido ao feriado municipal...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        
                            <hr class="my-4 border-gray-300">
                        
                            <div class="text-center">
                                <a href="#" class="text-[15px] text-blue-500 hover:underline">Ver todos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-stack-item" data-locked-from-sector data-widget="feed" gs-w="12" gs-h="18" gs-x="0" gs-y="18" data-widget-index="feed">
                    <div class="grid-stack-item-content bg-light border">
                        <div class="p-2 w-[220px] h-[400px]">
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex justify-start space-x-1">
                                    <img src="https://img.icons8.com/?size=100&id=82751&format=png&color=000000" class="w-4 h-4" alt="Ícone de usuário">
                                    <div>
                                        <h5 class="text-[10px] font-bold">Usuário</h5>
                                        <h6 class="text-[8px] text-gray-500">Jornalista, Cooperja</h6>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="bg-white p-2 rounded-lg">
                                <p class="text-gray-700 text-[8px] mb-2 line-clamp-3">
                                    E a rede de varejo da Cooperja iniciou outra super campanha comemorativa aos 55 anos da cooperativa. A promoção vai premiar clientes e cooperados que comprarem nas lojas agropecuárias. Posto de combustíveis e supermer...
                                </p>
                                
                                <img src="https://picsum.photos/220/120" class="w-full h-auto mb-2" alt="Imagem de exemplo">
                                
                                <div class="flex flex-wrap gap-1 text-[6px] text-gray-500">
                                    <span class="flex items-center space-x-0.5">
                                        <img src="https://img.icons8.com/?size=100&id=24816&format=png&color=000000" class="w-3 h-3" alt="Ícone de curtidas">
                                        <span>35</span>
                                    </span>
                                    <span class="flex items-center space-x-0.5">
                                        <img src="https://img.icons8.com/?size=100&id=143&format=png&color=000000" class="w-3 h-3" alt="Ícone de comentários">
                                        <span>14</span>
                                    </span>
                                    <span class="flex items-center space-x-0.5">
                                        <img src="https://img.icons8.com/?size=100&id=58564&format=png&color=000000" class="w-3 h-3" alt="Ícone de compartilhamentos">
                                        <span>5</span>
                                    </span>
                                    <span class="flex items-center space-x-0.5">
                                        <img src="https://img.icons8.com/?size=100&id=83134&format=png&color=000000" class="w-3 h-3" alt="Ícone de compartilhamentos">
                                        <span>5</span>
                                    </span>
                                </div>
                                <small class="text-gray-500 text-[6px] block mt-1">Há 3 dias</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-stack-item" data-locked-from-sector data-widget="wdiget" gs-w="12" gs-h="18" gs-x="0" gs-y="32" data-widget-index="widget">
                    <div class="grid-stack-item-content bg-light border">
                        <div class="w-[220px] h-[400px] p-3 bg-white rounded-lg">
                            <h1 class="text-[20px] font-bold mb-4">Aniversariantes do Dia</h1>
                        
                            <div class="space-y-4">
                                <div>
                                    <p class="text-[15px] font-semibold">Jaime Calvente Horta</p>
                                    <p class="text-[15px] text-gray-700">Setor: TI, Filial: Sede</p>
                                </div>
                                <hr class="my-4 border-gray-300">
                    
                                <div>
                                    <p class="text-[15px] font-semibold">Jaime Calvente Horta</p>
                                    <p class="text-[15px] text-gray-700">Setor: TI, Filial: Sede</p> 
                                </div>
                                <hr class="my-4 border-gray-300">
                    
                                <div>
                                    <p class="text-[15px] font-semibold">Jaime Calvente Horta</p>
                                    <p class="text-[15px] text-gray-700">Setor: TI, Filial: Sede</p>
                                </div>
                                <hr class="my-4 border-gray-300">
                    
                                <div>
                                    <p class="text-[15px] font-semibold">Jaime Calvente Horta</p>
                                    <p class="text-[15px] text-gray-700">Setor: TI, Filial: Sede</p>
                                </div>
                                <hr class="my-4 border-gray-300">
                    
                                <div>
                                    <p class="text-[15px] font-semibold">Jaime Calvente Horta</p>
                                    <p class="text-[15px] text-gray-700">Setor: TI, Filial: Sede</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($isManager)
        @livewire('widget-logs')
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const Toast = Swal.mixin({
                toast: true,          
                position: 'top-end',    
                showConfirmButton: false, 
                timer: 2000,          
                timerProgressBar: true
            });

            let dashboardItems = document.querySelectorAll('#main-dashboard .grid-stack-item');
            document.querySelectorAll(".bulk-actions button").forEach(button => {
                button.addEventListener("click", function (event) {
                    if (button.classList.contains("icon-disabled-sector")) {
                        event.preventDefault();
                        event.stopPropagation();
                        Toast.fire({
                            icon: 'error',
                            title: 'Ação não permitida'
                        })
                    }
                });
            });

            function resetLayout() {// Função para restaurar o layout
                Toast.fire({
                    icon: 'success',
                    title: 'Layout resetado'
                })
                setTimeout(() => {
                    Livewire.dispatch('resetLayout');
                    setTimeout(() => location.reload(), 500);
                }, 2000)
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
            
            const setDefaultBtn = document.getElementById('set-default');
            const saveBtn = document.getElementById('save-layout');
            const sidebar = document.getElementById('sidebar');
            const leftSidebar = document.getElementById('left-sidebar');
            const toggleButton = document.getElementById('toggle-sidebar');
            const toggleLeftSidebar = document.getElementById('toggle-left-sidebar');            
            const personalizeBtn = document.getElementById('personalize');
            const closeSidebar = document.getElementById('close-sidebar');
            const resetLayoutBtn = document.getElementById('reset-layout');

            let isEditing = false;

            if (setDefaultBtn) {
                setDefaultBtn.addEventListener('click', function () {
                    let layout = dashboard.save();
                    layout.forEach(item => {
                        let node = dashboard.engine.nodes.find(n => 
                            n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                        );

                        if (node) {
                            if (node.locked) {
                                item.locked_from_sector = true; 
                                node.locked_from_sector = true;
                            } else {
                                item.locked_from_sector = false; 
                                node.locked_from_sector = false;
                            }

                            if (!item.widgetIndex && node.el) {
                                item.widgetIndex = node.el.dataset.widgetIndex || null;
                            }
                        }
                    });
                    console.log(layout);
                    Toast.fire({
                        icon: 'success',
                        title: 'Layout do setor atualizado com sucesso!'
                    })
                    setTimeout(() => {
                        Livewire.dispatch('setDefaultLayoutSector', [layout]);
                        setTimeout(() => location.reload(), 500);
                    }, 2000)
                });
            }

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

            personalizeBtn.addEventListener('click', function () { //funcao para habilitar a personlização do layout
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

            document.addEventListener('click', function (event) { //funcao para as funcionalidades de fixar/desfixar, e habilitar/desabilitar os widgets especificos.
                let widget = event.target.closest('.grid-stack-item');
                if(!widget){
                    return;
                }
                let widgetIndex = widget.dataset.widgetIndex;
                let item = dashboard.engine.nodes.find(n => n.el === widget);
                let lockedFromSector = widget.dataset.lockedFromSector

                if (event.target.classList.contains('fix-widget')) {

                    if (widget) {
                        if (item) {
                            let isLocked = item.noMove && item.noResize && item.locked;

                            dashboard.update(widget, {
                                noMove: !isLocked,     
                                noResize: !isLocked,
                                locked: !isLocked,
                                widgetIndex: widgetIndex,
                                locked_from_sector: lockedFromSector
                            });

                            event.target.classList.toggle('icon-disabled', !isLocked);
                            Toast.fire({
                                icon: 'success',
                                title: `Widget ${widgetIndex} foi ${!isLocked ? 'fixado' : 'desfixado'}`
                            })

                            let layout = dashboard.save(); 
                            const finalLayout = layout.map(item => {
                                let node = dashboard.engine.nodes.find(n => 
                                    n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                                );
                                let fixed = node.locked
                                if (node) {
                                    item.widgetIndex = node.el.dataset.widgetIndex; 
                                    item.locked = fixed;  
                                    item.content = null  
                                    item.locked_from_sector = node.el.dataset.lockedFromSector || false;                   
                                }

                                return item;
                            });
                            saveBtn.addEventListener('click', function () {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Layout salvo com sucesso!'
                                })
                                setTimeout(() => {
                                    Livewire.dispatch('saveLayout', [finalLayout]);
                                    setTimeout(() => location.reload(), 500);
                                }, 2000)
                            });
                        }
                    }
                }
                if(event.target.classList.contains('resize-widget')){
                    if (item && !lockedFromSector) {  // Permite redimensionamento se não estiver bloqueado pelo setor
                        let isResizable = !item.noResize;
                        dashboard.update(widget, { noResize: isResizable });
                        Toast.fire({
                            icon: 'success',
                            title: `Redimensionamento de ${widgetIndex} foi ${isResizable ? 'desativado' : 'ativado'}`
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: `Widget ${widgetIndex} não pode ser redimensionado pois está fixado pelo setor.`
                        })
                    }
                }
            });

            document.addEventListener('click', function (event) { //função para habilitar a função de remoção de widget do dashboard para a sidebar
                if (event.target.classList.contains('remove-widget')) {
                    let widget = event.target.closest('.grid-stack-item');
                    let widgetIndex = widget.dataset.widgetIndex;
                    let lockedFromSector = widget.dataset.lockedFromSector; // Verifica se está bloqueado
                    if (lockedFromSector) {
                        Toast.fire({
                            icon: 'error',
                            title: `Widget ${widgetIndex} não pode ser removido pois está fixado pelo setor.`
                        });
                        return; 
                    }
                    
                    widget.style.display = 'none';                    

                    let sidebarItem = document.createElement('div');
                    sidebarItem.className = 'grid-stack-item';
                    sidebarItem.setAttribute('data-widget-index', widgetIndex);
                    sidebarItem.setAttribute('gs-w', '12');
                    sidebarItem.setAttribute('gs-h', '18');
                    sidebarItem.setAttribute('gs-x', '0');
                    sidebarItem.setAttribute('gs-y', '0');
                    sidebarItem.innerHTML = `${widget.innerHTML}`;

                    document.getElementById('right-sidebar').appendChild(sidebarItem);

                    sidebarGrid.makeWidget(sidebarItem);

                    dashboard.batchUpdate(); 
                    dashboard.engine.nodes = dashboard.engine.nodes.filter(node => node.el !== widget); 
                    console.log(dashboard.engine.nodes);                    
                    dashboard.commit(); 
                    Toast.fire({
                        icon: 'success',
                        title: `${widgetIndex} removido com sucesso.`
                    })
                    let layout = dashboard.save(); 
                    const finalLayout = layout.map(item => {
                        let node = dashboard.engine.nodes.find(n => 
                            n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                        );
                        
                        if (node) {
                            item.widgetIndex = node.el.dataset.widgetIndex;  
                            item.locked_from_sector = node.el.dataset.lockedFromSector                      
                        }

                        return item;
                    });
                    //console.log(finalLayout);
                    
                    saveBtn.addEventListener('click', function () {
                        Toast.fire({
                            icon: 'success',
                            title: 'Layout salvo com sucesso!'
                        })
                        setTimeout(() => {
                            Livewire.dispatch('saveLayout', [finalLayout]);
                            setTimeout(() => location.reload(), 500);
                        }, 2000)
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
                    //console.log(item);
                    
                });

                dashboard.commit();
            });

            dashboard.on('change', function(event, items) {
                let allWidgets = dashboard.save();
                let layoutToSave = [];
                
                // 2. Processa todos os widgets visíveis
                allWidgets.forEach(item => {
                    let node = dashboard.engine.nodes.find(n => 
                        n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                    );
                    
                    if (node && !node.locked) {
                        layoutToSave.push({
                            x: node.x,
                            y: node.y,
                            w: node.w,
                            h: node.h,
                            widgetIndex: node.el?.dataset?.widgetIndex || node.widgetIndex || null,
                            locked_from_sector: false,
                            locked: false
                        });
                    }
                });

                console.log('Todos widgets visíveis:', layoutToSave);

                saveBtn.addEventListener('click', function () {
                    Toast.fire({
                        icon: 'success',
                        title: 'Layout salvo com sucesso!'
                    })
                    setTimeout(() => {
                        Livewire.dispatch('saveLayout', [layoutToSave]);
                        setTimeout(() => location.reload(), 500);
                    }, 2000)
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
