<script>
    document.addEventListener('DOMContentLoaded', function () {
        //variaveis globais + definição de grids
        const setDefaultBtn = document.getElementById('set-default');
        const saveBtn = document.getElementById('save-layout');
        const sidebar = document.getElementById('sidebar');
        const leftSidebar = document.getElementById('left-sidebar');
        const toggleButton = document.getElementById('toggle-sidebar');
        const toggleLeftSidebar = document.getElementById('toggle-left-sidebar');            
        const personalizeBtn = document.getElementById('personalize');
        const closeSidebar = document.getElementById('close-sidebar');
        const resetLayoutBtn = document.getElementById('reset-layout');
        const categoryGrids = document.querySelectorAll('[data-category-grid]');
        const categoryGridInstances = {}
        let dashboard = GridStack.init({
            cellHeight: 100,
            minRow: 3,
            acceptWidgets: true,
            float: true,
            disableResize: true,
            disableDrag: true
        }, '#main-dashboard');
        let isEditing = false;
        const widgetSizes = {
            noticias: { w: 3, h: 5 },
            avisos: { w: 3, h: 5 },
            feed: { w: 9, h: 18, },
            widget: { w: 3, h: 5, },
        };
        let dashboardItems = document.querySelectorAll('#main-dashboard .grid-stack-item');

        //funções 
        
        function notify(options) {
            new FilamentNotification()
                .title(options.title)
                .body(options.body || '')
                .status(options.status || 'success')
                .duration(options.duration || 3000)
                .send();
        }
        
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
                        // console.log(`Removido widget ${widgetIndex} da categoria ${category}`);
                    }
                }
            });
            
            updateAllCounters();
            reorganizeSidebarWidgets();
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

                //console.log(`Grid inicializado para categoria ${categoryName}`);
            });

            reorganizeSidebarWidgets();
            return categoryGridInstances;
        }

        initializeCategoryGrids();  

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
        
        function resetLayout() {
            notify({
                title: 'Layout resetado com sucesso!',
                status: 'success'
            });
            setTimeout(() => {
                Livewire.dispatch('resetLayout');
                setTimeout(() => location.reload(), 500);
            }, 2000)
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

        function toggleEdit() {
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
        }
        
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
                            item.widgetCategory = node.el.dataset.category || node.widgetCategory;
                        } else {
                            item.locked_from_sector = false; 
                            node.locked_from_sector = false;
                            item.widgetCategory = node.el.dataset.category || node.widgetCategory;
                        }

                        if (!item.widgetIndex && node.el) {
                            item.widgetIndex = node.el.dataset.widgetIndex || null;
                            item.widgetCategory = node.el.dataset.category || node.widgetCategory;
                        }

                        if(!item.widgetCategory && node.el){
                            item.widgetCategory = node.el.dataset.category || node.widgetCategory;                                
                        }                            
                    }
                });

                setTimeout(() => {
                    Livewire.dispatch('setDefaultLayoutSector', [layout]);
                    setTimeout(() => location.reload(), 500);
                }, 2000)
            });
        }

        resetLayoutBtn.addEventListener('click', resetLayout);

        closeSidebar.addEventListener('click', function(){
            sidebar.classList.toggle('translate-x-full');
        })
        
        toggleLeftSidebar.addEventListener('click', function(){
            leftSidebar.classList.toggle('hidden')
        })

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('translate-x-full');

            if (!sidebar.classList.contains('translate-x-full')) {
                toggleEdit();
            }
        });

        personalizeBtn.addEventListener('click', function () {
            toggleEdit();
        });

        //funcionalidade de fixação, remoção e redimensionamento de widgets
        document.addEventListener('click', function (event) {
            let widget = event.target.closest('.grid-stack-item');
            if(!widget){
                return;
            }
            let widgetIndex = widget.dataset.widgetIndex;
            let item = dashboard.engine.nodes.find(n => n.el === widget);
            let lockedFromSector = widget.dataset.lockedFromSector
            let widgetCategory = widget.dataset.category;

            if (event.target.classList.contains('fix-widget')) {
                if (widget) {
                    if (item) {
                        let isLocked = item.noMove && item.noResize && item.locked;

                        dashboard.update(widget, {
                            noMove: !isLocked,     
                            noResize: !isLocked,
                            locked: !isLocked,
                            widgetIndex: widgetIndex,
                            locked_from_sector: lockedFromSector,
                            widgetCategory: widgetCategory
                        });

                        event.target.classList.toggle('icon-disabled', !isLocked);
                    
                        notify({
                            title: `Widget ${widgetIndex} foi ${!isLocked ? 'fixado' : 'desfixado'}`,
                            status: 'success'
                        });
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
                                item.widgetCategory = node.el.dataset.category;                
                            }

                            return item;
                        });
                        
                        setDefaultBtn.onclick = function () {
                            notify({
                                title: 'Layout salvo com sucesso!',
                                status: 'success'
                            });

                            setTimeout(() => {
                                Livewire.dispatch('saveLayout', [finalLayout]);
                                setTimeout(() => location.reload(), 500);
                            }, 2000)
                        };
                    }
                }
            }
            if(event.target.classList.contains('resize-widget')){
                if (item && !lockedFromSector) {
                    let isResizable = !item.noResize;
                    dashboard.update(widget, { noResize: isResizable });
                    notify({
                        title: `Redimensionamento de ${widgetIndex} foi ${isResizable ? 'desativado' : 'ativado'}`,
                        status: 'success'
                    });
                } else {
                    notify({
                        title: `Widget ${widgetIndex} não pode ser redimensionado pois está fixado pelo setor.`,
                        status: 'success'
                    });
                }
            }
            if (event.target.classList.contains('remove-widget')) {
                let widget = event.target.closest('.grid-stack-item');
                let widgetCategory = widget.dataset.category;
                let widgetIndex = widget.dataset.widgetIndex;
                
                let lockedFromSector = widget.dataset.lockedFromSector;
                if (lockedFromSector) {
                    notify({
                        title: `Widget ${widgetIndex} não pode ser removido pois está fixado pelo setor.`,
                        status: 'danger'
                    });
                    return; 
                }
                
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
                const finalLayout = layout.map(item => {
                    let node = dashboard.engine.nodes.find(n => 
                        n.x === item.x && n.y === item.y && n.w === item.w && n.h === item.h
                    );
                    
                    if (node) {
                        item.widgetIndex = node.el.dataset.widgetIndex;  
                        item.locked_from_sector = node.el.dataset.lockedFromSector 
                        item.widgetCategory = node.el.dataset.category;                     
                    }

                    return item;
                });
                if(isManager === false){
                    saveBtn.onclick = function () {
                        notify({
                            title: 'Layout salvo com sucesso!',
                            status: 'success'
                        })
                        setTimeout(() => {
                            Livewire.dispatch('saveLayout', [finalLayout]);
                            setTimeout(() => location.reload(), 500);
                        }, 2000)
                    };
                }
                
                reorganizeSidebarWidgets();
            }
        });

        //funções de drag and drop do dashboard
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
            let allWidgets = dashboard.save();
            let allWidgetsDOM = dashboard.getGridItems();
            
            allWidgetsDOM.forEach(item => {
                let widgetCategory = item.dataset.category
                let widgetIndex = item.dataset.widgetIndex;
                dashboard.engine.nodes.forEach(node => {
                    if (node.el === item) {
                        node.widgetIndex = widgetIndex;
                        node.widgetCategory = widgetCategory;
                    }
                })
            });
            
            reorganizeSidebarWidgets();
            
            let layoutToSave = [];
            
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
                        widgetCategory: node.widgetCategory,
                        widgetIndex: node.el?.dataset?.widgetIndex || node.widgetIndex || null,
                        locked_from_sector: false,
                        locked: false
                    });
                }
            });

            if(isManager){
                setDefaultBtn.onclick = function () {
                    notify({
                        title: 'Layout do setor salvo com sucesso!',
                        status: 'success'
                    });
                    setTimeout(() => {
                        Livewire.dispatch('saveLayout', [layoutToSave]);
                        setTimeout(() => location.reload(), 500);
                    }, 2000)
                };
            }else{
                saveBtn.onclick = function () {
                    notify({
                        title: 'Layout salvo com sucesso!',
                        status: 'success'
                    });
                    setTimeout(() => {
                        Livewire.dispatch('saveLayout', [layoutToSave]);
                        setTimeout(() => location.reload(), 500);
                    }, 2000)
                };
            }

        });
        
        dashboard.on('drag', function (event, item) {
            let widgetIndex = item.getAttribute('data-widget-index'); 
            let widgetCategory = item.getAttribute('data-category');
            if (!widgetIndex) return; 
            
            let { w: newWidth, h: newHeight } = widgetSizes[widgetIndex] || { w: 3, h: 5 };

            let itemX = parseInt(item.getAttribute('gs-x'));
            let itemY = parseInt(item.getAttribute('gs-y'));
            let node = dashboard.engine.nodes.find(n => n.x == itemX && n.y == itemY);
            
            if (node) {
                node.w = newWidth;
                node.h = newHeight;
                node.widgetIndex = widgetIndex;
                node.widgetCategory = widgetCategory;
                
                dashboard.update(node.el, { w: newWidth, h: newHeight, widgetIndex: widgetIndex });
                dashboard.commit();
            }
            
            reorganizeSidebarWidgets();
        });
    });
</script>