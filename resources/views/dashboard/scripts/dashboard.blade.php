<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.currentUserId = {{ auth()->user()->id }}; 
        // ======================
        // VARIAVEIS GLOBAIS
        // ======================
        const saveBtn = document.getElementById('save-layout');
        const sidebar = document.getElementById('sidebar');
        const leftSidebar = document.getElementById('left-sidebar');
        const toggleButton = document.getElementById('toggle-sidebar');
        const toggleLeftSidebar = document.getElementById('toggle-left-sidebar');            
        const personalizeBtn = document.getElementById('personalize');
        const closeSidebar = document.getElementById('close-sidebar');
        const resetLayoutBtn = document.getElementById('reset-layout');
        const headerPrincipal = document.getElementById('header-principal');
        const headerEdicao = document.getElementById('header-edicao');
        const cancelarEdicaoBtn = document.getElementById('edit-cancelar');
        const categoryGrids = document.querySelectorAll('[data-category-grid]');
        const categoryGridInstances = {};
        
        let dashboard = GridStack.init({
            cellHeight: 100,
            autoResize: false,
            minRow: 3,
            acceptWidgets: true,
            float: true,
            disableResize: true,
            disableDrag: true
        }, '#main-dashboard');
        
        let isEditing = false;
        let dashboardItems = document.querySelectorAll('#main-dashboard .grid-stack-item');
        
        const widgetSizes = {
            noticias: { w: 3, h: 5 },
            avisos: { w: 3, h: 5 },
            feed: { w: 9, h: 18 },
            widget: { w: 3, h: 5 },
        };

        // ======================
        // FUNÇÕES AUXILIARES	
        // ======================
        function notify(options) {
            new FilamentNotification()
                .title(options.title)
                .body(options.body || '')
                .status(options.status || 'success')
                .duration(options.duration || 3000)
                .send();
        }
        
        function getLivewireComponent(widgetIndex) {
            const components = {
                noticias: `@livewire('noticias')`,
                avisos: `@livewire('avisos')`,
                feed: `@livewire('feeds')`,
                widget: `@livewire('widgets-ex')`
            };
            return components[widgetIndex] || '';
        }
        
        function countWidgets(categoryId) {
            const grid = document.getElementById(`grid-${categoryId}`);
            if (!grid) return 0;
            return grid.querySelectorAll('.grid-stack-item').length;
        }
        
        function updateAllCounters() {
            const categories = ['comunicacao', 'financeiro', 'rh'];
            categories.forEach(category => {
                const counter = document.getElementById(`${category}-widget-count`);
                if (counter) {
                    counter.textContent = countWidgets(category);
                }
            });
        }

        // ======================
        // GERENCIAMENTO DE WIDGETS
        // ======================
        function reorganizeColumnAfterMinimize(widget) {
            const grid = dashboard;
            const isMinimized = widget.classList.contains('widget-minimized');
            const widgetNode = grid.engine.nodes.find(n => n.el === widget);
            
            if (!widgetNode) return;

            const originalHeight = parseInt(widget.dataset.originalHeight);
            const newHeight = isMinimized ? 2 : originalHeight;

            const allWidgets = grid.engine.nodes.map(node => ({
                el: node.el,
                x: node.x,
                y: node.y,
                w: node.w,
                h: node.h,
                locked: node.el?.dataset?.lockedFromSector === '1',
                node: node
            }));

            const widgetXStart = widgetNode.x;
            const widgetXEnd = widgetNode.x + widgetNode.w - 1;

            // Função para verificar se dois widgets ocupam colunas que se sobrepõem
            function overlaps(aStart, aEnd, bStart, bEnd) {
                return !(bStart > aEnd || bEnd < aStart);
            }

            grid.batchUpdate();

            widgetNode.h = newHeight;

            let movedWidgets = [widgetNode]; 

            let changed = true;
            while (changed) {
                changed = false;

                allWidgets.forEach(w => {
                    if (movedWidgets.includes(w.node)) return; 
                    if (w.locked) return; 
                    // Descobre se esse widget está imediatamente abaixo de algum widget já movido
                    const isBelow = movedWidgets.some(moved => {
                        const movedBottomY = moved.y + moved.h; 
                        return (
                            overlaps(moved.x, moved.x + moved.w - 1, w.x, w.x + w.w - 1) && 
                            w.y >= movedBottomY
                        );
                    });

                    if (isBelow) {
                        // Move o widget para encostar nos widgets já movidos
                        let targetY = 0;

                        // Encontrar o maior y+h dos widgets acima que sobrepõem
                        allWidgets.forEach(other => {
                            if (other === w) return;

                            if (
                                overlaps(other.x, other.x + other.w - 1, w.x, w.x + w.w - 1) &&
                                other.y + other.h <= w.y
                            ) {
                                targetY = Math.max(targetY, other.y + other.h);
                            }
                        });

                        if (w.y !== targetY) {
                            grid.update(w.el, { y: targetY });
                            w.y = targetY;
                            changed = true;
                        }

                        movedWidgets.push(w.node);
                    }
                });
            }

            grid.commit();
        }

        
        function toggleWidgetMinimize(widget) {            
            if(widget.dataset.lockedBy != '' && widget.dataset.lockedBy != window.currentUserId){
                notify({
                    title: 'Widget não pode ser minimizado pois está fixado pelo setor.',
                    status: 'danger'
                });
                return;
            }
            
            const isMinimized = widget.classList.contains('widget-minimized');
            const node = dashboard?.engine?.nodes?.find(n => n.el === widget);
            
            if (!node) return;
            
            if (!widget.dataset.originalHeight) {
                widget.dataset.originalHeight = node.h;
            }
            if (!widget.dataset.originalContent) {
                const snapshotDiv = widget.querySelector('div[wire\\:snapshot]');
                if (snapshotDiv) {
                    widget.dataset.originalContent = snapshotDiv.innerHTML;
                }
            }
            
            widget.classList.toggle('widget-minimized');
            
            const snapshotDiv = widget.querySelector('div[wire\\:snapshot]');
            if (snapshotDiv) {
                if (isMinimized) {
                    snapshotDiv.innerHTML = widget.dataset.originalContent;
                } else {
                    const widgetTitle = widget.querySelector('.widget-title').textContent;
                    const bulkActions = widget.querySelector('.bulk-actions');                    
                    const icon = bulkActions.querySelector('.minimize-widget i');   
                    if (icon) {
                        icon.classList.toggle('fa-chevron-down');
                        icon.classList.toggle('fa-chevron-up');
                    }    

                    snapshotDiv.innerHTML = `
                        <div class="flex items-center widget-minimized justify-between h-full pl-4 pr-3 bg-gradient-to-r from-gray-50 via-white to-gray-100 border-l-4 border-blue-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 ease-in-out group">
                            <div class="flex items-center min-w-0">
                                <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 mr-3 group-hover:bg-blue-200 transition-colors duration-300 shadow-sm">
                                    <i class="fas fa-window-minimize text-blue-600 text-sm"></i>
                                </div>
                                <span class="font-semibold text-gray-800 group-hover:text-blue-700 truncate transition-all duration-300">
                                    ${widgetTitle}
                                </span>
                            </div>
                            <div class="flex space-x-2 ml-2">
                                ${bulkActions.outerHTML}
                            </div>
                        </div>

                    `;
                }
            }
            
            const newHeight = isMinimized ? parseInt(widget.dataset.originalHeight) : 2;
            
            dashboard.update(widget, { h: newHeight });
            
            setTimeout(() => {
                reorganizeColumnAfterMinimize(widget);
                reorganizeSidebarWidgets();
            }, 100);
        }

        // ======================
        // GERENCIAMENTO DE CATEGORIAS
        // ======================
        function reorganizeSidebarWidgets() {
            Object.keys(categoryGridInstances).forEach(category => {
                const categoryGrid = categoryGridInstances[category];
                const widgets = categoryGrid.engine.nodes;
                
                widgets.sort((a, b) => a.y - b.y);
                
                let currentY = 0;
                widgets.forEach(widget => {
                    if (widget.y !== currentY) {
                        categoryGrid.update(widget.el, { y: currentY });
                    }
                    currentY += widget.h;
                });
                
                categoryGrid.commit();
            });
        }

        function initializeCategoryGrids() {
            const categoryGrids = document.querySelectorAll('[data-category-grid]');

            categoryGrids.forEach(gridElement => {
                const categoryName = gridElement.getAttribute('data-category-grid');
                categoryGridInstances[categoryName] = GridStack.init({
                    float: true,
                    disableResize: true,
                    acceptWidgets: true,
                    compact: true,
                }, `#grid-${categoryName}`);

                GridStack.setupDragIn(`#grid-${categoryName} .grid-stack-item`, {
                    appendTo: 'body',
                    helper: 'clone'
                });
            });

            reorganizeSidebarWidgets();
            return categoryGridInstances;
        }

        function removeDuplicateWidgetsFromCategories() {
            const dashboardWidgets = dashboard.engine.nodes.map(node => node.el.dataset.widgetIndex);
            
            Object.keys(categoryGridInstances).forEach(category => {
                const categoryGrid = categoryGridInstances[category];
                const categoryWidgets = categoryGrid.engine.nodes;
                
                for (let i = categoryWidgets.length - 1; i >= 0; i--) {
                    const widget = categoryWidgets[i];
                    const widgetIndex = widget.el.dataset.widgetIndex;
                    
                    if (dashboardWidgets.includes(widgetIndex)) {
                        categoryGrid.removeWidget(widget.el, true); 
                    }
                }
            });
            
            updateAllCounters();
            reorganizeSidebarWidgets();
        }

        // ======================
        // GERENCIAMENTO DE LAYOUT
        // ======================
        function resetLayout() {
            notify({
                title: 'Layout resetado com sucesso!',
                status: 'success'
            });
            setTimeout(() => {
                Livewire.dispatch('resetLayout');
            }, 2000)
        }
        
        function toggleEditMode(){
            headerPrincipal.classList.toggle('hidden');
            headerEdicao.classList.toggle('hidden');
            dashboardItems.forEach(item => {
                let content = item.querySelector('.grid-stack-item-content');
                if (content) {
                    content.classList.toggle('border-2');
                    content.classList.toggle('border-blue-500');
                    content.classList.toggle('border-dashed');
                }
            });
        }

        function toggleEdit() {
            if (!isEditing) {
                dashboard.enable(); 
                dashboard.enableMove(true); 
                dashboard.enableResize(true); 
                dashboard.float(true); 
            } else {
                dashboard.disable(); 
                dashboard.enableMove(false); 
                dashboard.enableResize(false); 
                dashboard.float(false); 
            }
            isEditing = !isEditing;
        }        

        // ======================
        // EVENT LISTENERS
        // ======================
        document.addEventListener('click', function(e) {
            if (e.target.closest('.minimize-widget')) {
                const widget = e.target.closest('.grid-stack-item');
                if (widget) {
                    toggleWidgetMinimize(widget);
                } else {
                    console.warn('Não foi possível encontrar o widget associado ao botão de minimizar');
                }
            }
        });

        document.addEventListener('click', function (event) {
            let widget = event.target.closest('.grid-stack-item');
            if (!widget) return;

            let widgetIndex = widget.dataset.widgetIndex;
            let item = dashboard.engine.nodes.find(n => n.el === widget);
            let lockedFromSector = widget.dataset.lockedFromSector;
            let widgetCategory = widget.dataset.category;
            let lockedBy = widget.dataset.lockedBy; 
            
            if (event.target.classList.contains('fix-widget')) {
                if (lockedBy == window.currentUserId || lockedBy == '' || lockedBy == null) {
                    if (item) {
                        let isLocked = item.noMove && item.noResize && item.locked;

                        dashboard.update(widget, {
                            noMove: !isLocked,
                            noResize: !isLocked,
                            locked: !isLocked,
                            widgetIndex: widgetIndex,
                            locked_from_sector: lockedFromSector,
                            widgetCategory: widgetCategory,
                            locked_by: !isLocked ? window.currentUserId : null 
                        });

                        event.target.classList.toggle('icon-disabled', !isLocked);

                        notify({
                            title: `Widget ${widgetIndex} foi ${!isLocked ? 'fixado' : 'desfixado'}`,
                            status: 'success'
                        });

                        let finalLayout = dashboard.save();
                        finalLayout.forEach(item => {
                            const node = dashboard.engine.nodes.find(n => 
                                n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                            );
                            
                            if (node) {
                                item.widgetIndex = node.el.dataset.widgetIndex;  
                                item.widgetCategory = node.el.dataset.category;  
                                item.content = null;
                                item.locked_by = node.el.dataset.lockedBy ? node.el.dataset.lockedBy : window.currentUserId;                   
                            }
                        });
                        
                        saveBtn.onclick = function () {
                            notify({
                                title: 'Layout salvo com sucesso!',
                                status: 'success'
                            });

                            setTimeout(() => {
                                Livewire.dispatch('saveLayout', [finalLayout]);
                            }, 2000);
                        };
                    }
                }else{
                    notify({
                        title: `Widget ${widgetIndex} não pode ser fixado pois está fixado pelo setor.`,
                        status: 'danger'
                    });
                }
            }
            if(event.target.classList.contains('resize-widget')){

                if(lockedBy == window.currentUserId || lockedBy == '' || lockedBy == null){ 
                    let isResizable = !item.noResize;
                    dashboard.update(widget, { noResize: isResizable });
                    notify({
                        title: `Redimensionamento de ${widgetIndex} foi ${isResizable ? 'desativado' : 'ativado'}`,
                        status: 'success'
                    });
                }else{
                    notify({
                        title: `Widget ${widgetIndex} não pode ser redimensionado pois está fixado pelo setor.`,
                        status: 'danger'
                    });
                }
            }
            if (event.target.classList.contains('remove-widget')) {
                if(lockedBy == window.currentUserId || lockedBy == '' || lockedBy == null) {
                    let widget = event.target.closest('.grid-stack-item');
                    let widgetCategory = widget.dataset.category;
                    let widgetIndex = widget.dataset.widgetIndex;
                    let lockedFromSector = widget.dataset.lockedFromSector;
                    widget.style.display = 'none';                    

                    let sidebarItem = document.createElement('div');
                    sidebarItem.className = 'grid-stack-item';
                    sidebarItem.setAttribute('data-widget-index', widgetIndex);
                    sidebarItem.setAttribute('data-category', widgetCategory);
                    sidebarItem.setAttribute('gs-w', '12');
                    sidebarItem.setAttribute('gs-h', '18');
                    sidebarItem.setAttribute('gs-x', '0');
                    sidebarItem.setAttribute('gs-y', '0');
                    sidebarItem.innerHTML = `${widget.innerHTML}`; 

                    document.getElementById(`grid-${widgetCategory}`).appendChild(sidebarItem);
                    categoryGridInstances[`${widgetCategory}`].makeWidget(sidebarItem);
                    let categoryGrid = document.querySelector(`#grid-${widgetCategory}`);

                    dashboard.batchUpdate(); 
                    dashboard.engine.nodes = dashboard.engine.nodes.filter(node => node.el !== widget); 
                    dashboard.commit(); 
                    notify({
                        title: `${widgetIndex} removido com sucesso.`,
                        status: 'success'
                    });
                    let layout = dashboard.save(); 
                    
                    const finalLayout = layout
                        .map(item => {
                            let node = dashboard.engine.nodes.find(n => 
                                n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                            );

                            if (node) {
                                item.widgetIndex = node.el.dataset.widgetIndex;  
                                item.locked_from_sector = node.el.dataset.lockedFromSector;
                                item.lockedBy = node.el.dataset.lockedBy;
                                item.widgetCategory = node.el.dataset.category; 
                                item.content = null;
                            }

                            return item;
                        })
                        .filter(item => item.lockedBy == window.currentUserId || !item.lockedBy);
                    
                        saveBtn.onclick = function () {
                            notify({
                                title: 'Layout salvo com sucesso!',
                                status: 'success'
                            })
                            setTimeout(() => {
                                Livewire.dispatch('saveLayout', [finalLayout]);
                            }, 2000)
                        };
                    
                    reorganizeSidebarWidgets();
                } else {
                    notify({
                        title: `Widget ${widgetIndex} não pode ser removido pois está fixado pelo setor.`,
                        status: 'danger'
                    });
                    return;
                }
            }
        });

        // ======================
        // DASHBOARD EVENTOS
        // ======================
                
        dashboard.on('dropped', function(event, previousWidget, newWidget) {
            const origin = newWidget.el.getAttribute('data-origin');             
            if(origin == 'sidebar'){
                const widgetIndex = newWidget.el.dataset.widgetIndex;
                const widgetCategory = newWidget.el.dataset.category;
                
                const { w: newWidth, h: newHeight } = widgetSizes[widgetIndex] || { w: 3, h: 5 };
                
                dashboard.update(newWidget.el, { 
                    w: newWidth, 
                    h: newHeight,
                    widgetIndex: widgetIndex,
                    widgetCategory: widgetCategory,
                });
                reorganizeColumnAfterMinimize(newWidget.el);
                reorganizeSidebarWidgets();
            }
        });

        dashboard.on('added', function (event, items) {
            dashboard.batchUpdate();

            items.forEach((item) => {
                let widgetIndex = item.el.dataset.widgetIndex;
                let widgetCategory = item.el.dataset.category;
                
                if (widgetIndex) {
                    let livewireComponent = getLivewireComponent(widgetIndex);
                    item.el.querySelector('.grid-stack-item-content').innerHTML = livewireComponent;
                    item.widgetCategory = widgetCategory; 
                }
            });

            dashboard.commit();
            reorganizeSidebarWidgets();
        });

        dashboard.on('change', function(event, items) {
            let allWidgetsDOM = dashboard.getGridItems();
            let allWidgets = dashboard.save();
            
            allWidgetsDOM.forEach(item => {                
                let widgetCategory = item.dataset.category;
                let lockedBy = item.dataset.lockedBy;
                let widgetIndex = item.dataset.widgetIndex;
                dashboard.engine.nodes.forEach(node => {
                    if (node.el === item) {
                        node.widgetIndex = widgetIndex;
                        node.widgetCategory = widgetCategory;
                        node.lockedBy = lockedBy;
                    }
                })
            });
            
            reorganizeSidebarWidgets();

            let layoutToSave = [];
      
            allWidgets.forEach(item => {
                let node = dashboard.engine.nodes.find(n => 
                    n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                );
                
                if (node) {
                    const heightToSave = node.el.dataset.originalHeight ? 
                        parseInt(node.el.dataset.originalHeight) : 
                        node.h;
                    if(node.lockedBy == window.currentUserId || node.lockedBy == '' || node.lockedBy == null){
                        layoutToSave.push({
                            x: node.x,
                            y: node.y,
                            w: node.w,
                            h: heightToSave, 
                            widgetCategory: node.widgetCategory,
                            widgetIndex: node.el?.dataset?.widgetIndex || node.widgetIndex || null,
                            locked_from_sector: node.locked_from_sector || false,
                            locked: node.locked || false,
                            locked_by: node.lockedBy || null,
                        });
                    }
                }
            });    
            // console.log(layoutToSave, 'change');
            
            saveBtn.onclick = function () {
                notify({
                    title: 'Layout salvo com sucesso!',
                    status: 'success'
                });
                setTimeout(() => {
                    Livewire.dispatch('saveLayout', [layoutToSave]);
                }, 2000)
            };
        });
        
        dashboard.on('drag', function (event, item) {
            let origin = item.getAttribute('data-origin');
            let widgetIndex = item.getAttribute('data-widget-index'); 
            let widgetCategory = item.getAttribute('data-category');
            if (!widgetIndex) return; 
            
            let { w: newWidth, h: newHeight } = widgetSizes[widgetIndex] || { w: 3, h: 5 };

            let itemX = parseInt(item.getAttribute('gs-x'));
            let itemY = parseInt(item.getAttribute('gs-y'));
            let node = dashboard.engine.nodes.find(n => n.x == itemX && n.y == itemY);
            
            if (node && origin == 'sidebar') {
                node.w = newWidth;
                node.h = newHeight;
                node.widgetIndex = widgetIndex;
                node.widgetCategory = widgetCategory;
                
                dashboard.update(node.el, { w: newWidth, h: newHeight, widgetIndex: widgetIndex });
                dashboard.commit();
            }
            
            reorganizeSidebarWidgets();
        });

        // ======================
        // INICIALIZAÇÃO
        // ======================
        initializeCategoryGrids();  
        
        dashboardItems.forEach((item) => {
            let widgetIndex = item.dataset.widgetIndex;
            
            if (widgetIndex) {
                let sidebarItem = document.querySelector(`#right-sidebar .grid-stack-item[data-widget-index="${widgetIndex}"]`);
                if (sidebarItem) {
                    sidebarItem.remove();
                }
            }
        });

        removeDuplicateWidgetsFromCategories();

        const observer = new MutationObserver(function(mutations) {
            updateAllCounters();
            reorganizeSidebarWidgets();
        });

        document.querySelectorAll('[data-category-grid]').forEach(grid => {
            observer.observe(grid, {
                childList: true,
                subtree: true
            });
        });

        updateAllCounters();

        document.querySelectorAll('[data-category]').forEach(button => {
            button.addEventListener('click', function() {
                setTimeout(() => {
                    updateAllCounters();
                    reorganizeSidebarWidgets();
                }, 300); 
            });
        }); 

        document.querySelectorAll(".bulk-actions button").forEach(button => {
            button.addEventListener("click", function (event) {
                if (button.classList.contains("icon-disabled-sector")) {
                    event.preventDefault();
                    event.stopPropagation();
                    notify({
                        title: 'Ação não permitida',
                        status: 'danger'
                    });
                }
            });
        });

        document.getElementById('modal-save-open').addEventListener('click', () => {
            document.getElementById('save-modal').classList.remove('hidden');
        });

        document.getElementById('modal-save').addEventListener('click', () => {
            document.getElementById('save-modal').classList.remove('hidden');
        });

        document.getElementById('modal-reset').addEventListener('click', () => {
            document.getElementById('reset-modal').classList.remove('hidden');
        });
        
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('save-modal').classList.add('hidden');
                document.getElementById('reset-modal').classList.add('hidden');
            });
        });

        document.getElementById('save-layout').addEventListener('click', () => {
            document.getElementById('save-modal').classList.add('hidden');
        });

        document.getElementById('reset-layout').addEventListener('click', () => {
            document.getElementById('reset-modal').classList.add('hidden');
        });

        resetLayoutBtn.addEventListener('click', resetLayout);

        closeSidebar.addEventListener('click', function(){
            sidebar.classList.toggle('translate-x-full');
        })
    
        toggleLeftSidebar.onclick = function() {
            leftSidebar.classList.toggle('active');
        };

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('translate-x-full');

            if (!sidebar.classList.contains('translate-x-full')) {
                toggleEdit();
            }
        });
        
        personalizeBtn.addEventListener('click', function () {
            toggleEdit();
            toggleEditMode();
        });

        cancelarEdicaoBtn.addEventListener('click', function () {
            toggleEdit();
            toggleEditMode();
        });

        document.getElementById('floating-action-button').addEventListener('click', function() {
            const menu = document.getElementById('action-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
            menu.classList.toggle('flex-col');
        });
        
        Livewire.on('layoutSaved', function () {
            location.reload();
        });
    });
</script>