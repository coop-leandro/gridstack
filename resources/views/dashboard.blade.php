<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Personalizável</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gridstack/4.0.0/gridstack.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                @livewire('dashboard-editor')
            </div>
        </div>
        <button id="save-layout" class="btn btn-success save-layout mt-3">Salvar Layout</button>
        <button id="toggle-sidebar" class="btn btn-primary sidebar-toggle">Personalizar</button>

        <div id="sidebar" class="right-sidebar">
            <h5>Personalizar Layout</h5>
            <p>Arraste os blocos para o dashboard.</p>

            <div id="right-sidebar" class="grid-stack">
                <div class="grid-stack-item" data-widget="noticias" gs-w="12" gs-h="6" gs-x="0" gs-y="0" data-widget-index="1">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        📖 Notícias
                    </div>
                </div>
                <div class="grid-stack-item" data-widget="avisos" gs-w="12" gs-h="6" gs-x="0" gs-y="6" data-widget-index="2">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        🚨 Avisos
                    </div>
                </div>
                <div class="grid-stack-item" data-widget="calendario" gs-w="12" gs-h="6" gs-x="0" gs-y="12" data-widget-index="3">
                    <div class="grid-stack-item-content bg-light p-3 border">
                        📅 Teste
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

            dashboardItems.forEach((item) => {
                let widgetIndex = item.dataset.widgetIndex;
                
                if (widgetIndex) {
                    let sidebarItem = document.querySelector(`#right-sidebar .grid-stack-item[data-widget-index="${widgetIndex}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }
                }
            });
            let dashboard = GridStack.init({
                cellHeight: 100,
                minRow: 10,
                acceptWidgets: true,
                float: true,
                draggable: true,
            }, '#main-dashboard');

            let sidebarGrid = GridStack.init({
                float: false,
                disableResize : true,
                acceptWidgets: true,
            }, '#right-sidebar');

            GridStack.setupDragIn('#right-sidebar .grid-stack-item', { appendTo: 'body', helper: 'clone' });

            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.getElementById('toggle-sidebar');

            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('active');
                toggleButton.textContent = sidebar.classList.contains('active') ? 'Fechar' : 'Personalizar';
            });

            const saveBtn = document.getElementById('save-layout');

            const Widgets = [
                {   
                    widgetIndex: 1,
                    x: 0,
                    y: 0,
                    w: 6,
                    h: 7,
                    content:`
                        <h4 class="d-flex align-items-center mb-3">
                            <i class="bi bi-newspaper me-2"></i> Notícias
                        </h4>
                        <button class="btn btn-danger btn-sm remove-widget" style="display: none;">
                            X
                        </button>
                        <div class="news-item d-flex align-items-center border-bottom pb-3 mb-3">
                            <img src="https://picsum.photos/250/150" class="img-fluid rounded me-3" alt="Notícia">
                            <div class="news-content w-100">
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar me-1"></i> 14 Fev, 2025 |
                                    <i class="bi bi-chat-left-text ms-2 me-1"></i> 136 COMENTÁRIOS
                                </div>
                                <h5 class="mt-1 fw-bold">Título da notícia</h5>
                                <p class="mb-1 text-muted">Descrição da notícia...</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Autor&background=random" class="rounded-circle me-2" alt="Autor">
                                    <span class="text-muted">Autor</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-dark ms-auto">
                                Ler Mais <i class="bi bi-arrow-right-circle ms-1"></i>
                            </a>
                        </div>
                        <div class="news-item d-flex align-items-center border-bottom pb-3 mb-3">
                            <img src="https://picsum.photos/250/150" class="img-fluid rounded me-3" alt="Notícia">
                            <div class="news-content w-100">
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar me-1"></i> 14 Fev, 2025 |
                                    <i class="bi bi-chat-left-text ms-2 me-1"></i> 136 COMENTÁRIOS
                                </div>
                                <h5 class="mt-1 fw-bold">Título da notícia</h5>
                                <p class="mb-1 text-muted">Descrição da notícia...</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Autor&background=random" class="rounded-circle me-2" alt="Autor">
                                    <span class="text-muted">Autor</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-dark ms-auto">
                                Ler Mais <i class="bi bi-arrow-right-circle ms-1"></i>
                            </a>
                        </div><div class="news-item d-flex align-items-center border-bottom pb-3 mb-3">
                            <img src="https://picsum.photos/250/150" class="img-fluid rounded me-3" alt="Notícia">
                            <div class="news-content w-100">
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar me-1"></i> 14 Fev, 2025 |
                                    <i class="bi bi-chat-left-text ms-2 me-1"></i> 136 COMENTÁRIOS
                                </div>
                                <h5 class="mt-1 fw-bold">Título da notícia</h5>
                                <p class="mb-1 text-muted">Descrição da notícia...</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Autor&background=random" class="rounded-circle me-2" alt="Autor">
                                    <span class="text-muted">Autor</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-dark ms-auto">
                                Ler Mais <i class="bi bi-arrow-right-circle ms-1"></i>
                            </a>
                        </div>
                        <div class="news-item d-flex align-items-center border-bottom pb-3 mb-3">
                            <img src="https://picsum.photos/250/150" class="img-fluid rounded me-3" alt="Notícia">
                            <div class="news-content w-100">
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar me-1"></i> 14 Fev, 2025 |
                                    <i class="bi bi-chat-left-text ms-2 me-1"></i> 136 COMENTÁRIOS
                                </div>
                                <h5 class="mt-1 fw-bold">Título da notícia</h5>
                                <p class="mb-1 text-muted">Descrição da notícia...</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Autor&background=random" class="rounded-circle me-2" alt="Autor">
                                    <span class="text-muted">Autor</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-dark ms-auto">
                                Ler Mais <i class="bi bi-arrow-right-circle ms-1"></i>
                            </a>
                        </div>`
                },
                {
                    widgetIndex: 2,
                    x: 6,
                    y: 0,
                    w: 3,
                    h: 4,
                    content: `
                        <h4 class="d-flex align-items-center mb-3">
                        <i class="bi bi-exclamation-triangle me-2"></i> Avisos
                        </h4>
                        <button class="btn btn-success mb-3">
                            <i class="bi bi-plus"></i> Novo aviso
                        </button>
                        <button class="btn btn-danger btn-sm remove-widget" style="display: none;">
                            X
                        </button>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                        </ul>
                    `
                },
                {
                    widgetIndex: 3,
                    x: 9,
                    y: 0,
                    w: 3,
                    h: 4,
                    content: `
                        <h4 class="d-flex align-items-center mb-3">
                        <i class="bi bi-exclamation-triangle me-2"></i> Avisos
                        </h4>
                        <button class="btn btn-success mb-3">
                            <i class="bi bi-plus"></i> Novo aviso
                        </button>
                        <button class="btn btn-danger btn-sm remove-widget" style="display: none;">
                            X
                        </button>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Uma vez Pedro Álvares Cabral disse...
                                <div>
                                    <button class="btn btn-warning btn-sm me-2"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </li>
                        </ul>
                    `
                },
            ]
            
            dashboard.on('added', function (event, items) {
                dashboard.batchUpdate();

                items.forEach((item) => {
                    let widgetIndex = parseInt(item.el.dataset.widgetIndex, 10);
                    let widget = Widgets.find(w => w.widgetIndex === widgetIndex);
                    console.log(item.el.gridstackNode);
                    
                    if (widget) {
                        let widgetContent = widget.content; 
                        let widgetElement = item.el.querySelector('.grid-stack-item-content');
                        widgetElement.innerHTML = widgetContent;
                        item.el.gridstackNode.widgetIndex = widgetIndex;
                        
                        dashboard.update(item.el, { x: widget.x, y: widget.y, w: widget.w, h: widget.h, widgetIndex: widgetIndex });
                    }
                });
                dashboard.commit(); 
            });


            dashboard.on('change', function (event, items) {
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
            });

        });
    </script>
</body>
</html>
