<div>
    <input wire:model.live.100ms="search" class="form-control mb-3 p-2 w-full border border-gray-300 rounded shadow-sm" type="search" placeholder="Pesquisar o nome do widget..." aria-label="Search">
    <div id="no-results-message" class="hidden p-4 text-center text-gray-500">
        Nenhum widget encontrado com o termo pesquisado.
    </div>
</div>
 
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         // Armazena o estado original dos accordions
         const originalState = new Map();
         const accordions = document.querySelectorAll('#right-sidebar .border.rounded-lg');
         //document.getElementById('no-results-message')?.classList.add('hidden');

         
         // Salva o estado inicial
         accordions.forEach(accordion => {
             originalState.set(accordion, {
                 display: accordion.style.display,
                 widgets: Array.from(accordion.querySelectorAll('.grid-stack-item')).map(widget => ({
                     element: widget,
                     display: widget.style.display,
                     y: widget.getAttribute('gs-y')
                 }))
             });
         });
 
         Livewire.on('searchUpdated', searchValue => {
             const searchTerm = searchValue;
             let foundAny = false;
 
             if (searchTerm === '') {
                 // Restaura o estado original
                 originalState.forEach((state, accordion) => {
                     accordion.style.display = state.display;
                     
                     state.widgets.forEach(widgetState => {
                         widgetState.element.style.display = widgetState.display;
                         widgetState.element.setAttribute('gs-y', widgetState.y);
                     });
                 });
                 return;
             }
 
             // Esconde todos os accordions inicialmente
             accordions.forEach(accordion => {
                 accordion.style.display = 'none';
             });
 
             // Procura widgets correspondentes
             originalState.forEach((state, accordion) => {
                 let accordionHasResults = false;
                 let positionY = 0;
 
                 state.widgets.forEach(widgetState => {
                     const widget = widgetState.element;
                     const content = widget.querySelector('.grid-stack-item-content');
                     //console.log(widget);
                     const widgetIndex = widget.getAttribute('data-widget-index').toLowerCase();
                     
                     if (widgetIndex.includes(searchTerm)) {
                         // Mostra o accordion se tiver resultados
                         accordion.style.display = 'block';
                         accordionHasResults = true;
                         foundAny = true;
                         
                         // Mostra apenas o widget correspondente
                         widget.style.display = 'block';
                         content.style.display = 'block';
                         widget.setAttribute('gs-y', positionY);
                         positionY += parseInt(widget.getAttribute('gs-h')) || 1;
                     } else {
                         // Esconde outros widgets
                         widget.style.display = 'none';
                     }
                 });
 
                 // Compacta os widgets visíveis
                 if (accordionHasResults) {
                     const grid = accordion.querySelector('.grid-stack');
                     if (grid && grid._grid) {
                         grid._grid.compact('compact', true);
                     }
                 }
             });
 
             // Se nenhum resultado foi encontrado, mostra mensagem
             if (!foundAny) {
                document.getElementById('no-results-message')?.classList.remove('hidden');
             }
         });
     });
 </script>