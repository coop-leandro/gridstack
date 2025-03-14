<div>
   <input wire:model.live.debounce.500ms="search" class="form-control mb-3 p-2 w-70 border border-gray-300 rounded shadow-sm" type="search" placeholder="Pesquisar o nome do widget..." aria-label="Search">
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('searchUpdated', searchValue => {
            document.querySelectorAll('#right-sidebar .grid-stack-item').forEach(widget => {
                let widgetIndex = widget.getAttribute('data-widget-index').toLowerCase();
                
                if (widgetIndex.includes(searchValue) || searchValue === '') {
                    widget.style.display = 'block';
                    widget.setAttribute('gs-y', 0);                    
                } else {
                    widget.style.display = 'none';
                }
            });
        });
    });
</script>
