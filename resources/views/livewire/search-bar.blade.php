<div>
    <input wire:model.live.300ms="search" class="form-control mb-3 p-2 w-full border border-gray-300 rounded shadow-sm" type="search" placeholder="Pesquisar o nome do widget..." aria-label="Search">
    <div id="no-results-message" class="hidden p-4 text-center text-gray-500">
        Nenhum widget encontrado com o termo pesquisado.
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const originalState = new Map();
        const accordions = document.querySelectorAll('#right-sidebar .border.rounded-lg');
        
        function reorganizeOnEmptySearch() { //função para reorganizar os widgets sempre do topo para baixo           
            originalState.forEach((state, accordion) => {
                accordion.style.display = state.display;

                state.widgets.forEach(widgetState => {
                    
                    if (isWidgetActive(widgetState.element)) {
                        widgetState.element.style.display = widgetState.display;
                    }
                });
            });
        }

        accordions.forEach(accordion => {
            originalState.set(accordion, {
                display: accordion.style.display,
                widgets: Array.from(accordion.querySelectorAll('.grid-stack-item'))
                    .filter(widget => widget.hasAttribute('data-widget-index'))
                    .map(widget => ({
                        element: widget,
                        display: widget.style.display,
                        y: widget.getAttribute('gs-y'),
                        category: widget.getAttribute('data-category'),
                        index: widget.getAttribute('data-widget-index')
                    }))
            });
        });
    
        function isWidgetActive(widgetElement) {
            const category = widgetElement.getAttribute('data-category');
            const grid = document.getElementById(`grid-${category}`);
            return grid?.contains(widgetElement) && 
                   !widgetElement.hasAttribute('gs-removed');
        }
    
        Livewire.on('searchUpdated', function(searchValue) {
            const searchTerm = searchValue;
            const noResultsMessage = document.getElementById('no-results-message');
            let foundAny = false;
    
            noResultsMessage.classList.add('hidden');
            accordions.forEach(accordion => accordion.style.display = 'none');
    
            if (searchTerm == '') {
                reorganizeOnEmptySearch(); 
                return;
            }
    
            originalState.forEach((state, accordion) => {
                let positionY = 0;
                let accordionHasResults = false;
    
                state.widgets.forEach(widgetState => {
                    const widget = widgetState.element;
                    
                    if (!isWidgetActive(widget)) {
                        widget.style.display = 'none';
                        return;
                    }
    
                    const widgetIndex = widget.getAttribute('data-widget-index').toLowerCase();
                    const content = widget.querySelector('.grid-stack-item-content');
    
                    if (widgetIndex.includes(searchTerm)) {
                        accordion.style.display = 'block';
                        accordionHasResults = true;
                        foundAny = true;
                        
                        widget.style.display = 'block';
                        content.style.display = 'block';
                        widget.setAttribute('gs-y', positionY);
                        positionY += parseInt(widget.getAttribute('gs-h')) || 1;
                    } else {
                        widget.style.display = 'none';
                    }
                });
    
                if (accordionHasResults) {
                    const button = accordion.querySelector('button');
                    if (button && !button.classList.contains('collapsed')) {
                        button.click();
                    }
                    
                    const grid = accordion.querySelector('.grid-stack');
                    if (grid?._grid) {
                        grid._grid.compact();
                    }
                }
            });
    
            if (!foundAny) {
                noResultsMessage.classList.remove('hidden');
            }
        });
    
        function syncWidgets() {
            accordions.forEach(accordion => {
                const category = accordion.querySelector('button[data-category]')?.getAttribute('data-category');
                if (!category) return;
    
                const grid = document.getElementById(`grid-${category}`);
                if (!grid) return;
    
                const state = originalState.get(accordion);
                if (state) {
                    state.widgets = state.widgets.filter(widgetState => 
                        grid.contains(widgetState.element)
                    );
                }
            });
        }
    
        document.addEventListener('gridstack-change', function() {
            syncWidgets();
        });
    });
</script>