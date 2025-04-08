<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Personalizável</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gridstack.js/11.2.0/gridstack.min.css" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
    @filamentStyles
</head>
<body>   
    @livewire('dashboard-editor')
    <header class="flex justify-between header items-center px-4 py-3 bg-white ">
        <div class="flex items-center">
            <button id="toggle-left-sidebar" class="bg-white border-0 rounded-full ms-3 p-2 shadow-sm hover:bg-gray-50">
                <img src="https://img.icons8.com/?size=100&id=36389&format=png&color=000000" alt="Ícone de Menu" class="w-6 h-6">
            </button>  
        </div>
        <div class="flex items-center gap-3">
            @if ($isManager)
                <div>
                    <button id="set-default" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Setar Default</button>
                </div>
            @endif
            @if (!$isManager)
                <div>
                    <button id="save-layout" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Salvar Layout</button>
                </div>
            @endif
    
            <div>                
                <button id="toggle-sidebar" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Adicionar Widgets</button>
            </div>

            <div>
                <button id="personalize" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Editar</button>
            </div>
    
            <div>
                <button id="reset-layout" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Resetar Layout</button>
            </div>    
        </div>
    </header>
    
    <div id="sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 p-4 overflow-y-auto" wire:ignore>
        <h5 class="text-lg font-semibold mb-2">Personalizar Layout</h5>
        <p class="text-gray-600 mb-4">Arraste os blocos para o dashboard.</p>
        <button id="close-sidebar" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4">Fechar</button>
        
        @livewire('search-bar')
        
        <div id="right-sidebar" class="grid-stack">
            <div class="space-y-4" x-data="{ openCategory: null }">
                <!-- Categoria Comunicação -->
                <div class="border rounded-lg overflow-hidden">
                    <button 
                        @click="openCategory === 'comunicacao' ? openCategory = null : openCategory = 'comunicacao'"
                        class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                    >
                        <div class="flex items-center">
                            <i class="fas fa-bullhorn mr-2 text-gray-600"></i>
                            <span class="font-medium">Comunicação</span>
                        </div>
                        <div class="flex items-center">
                            <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                            id="comunicacao-widget-count">0</span>
                            <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                                :class="{ 'transform rotate-180': openCategory === 'comunicacao' }"></i>
                        </div>
                    </button>
                    
                    <div x-show="openCategory === 'comunicacao'" x-collapse class="bg-white">
                        <div>
                            <div class="grid-stack" id="grid-comunicacao" data-category-grid="comunicacao">
                                <div class="grid-stack-item z-999" data-category="comunicacao" data-locked-from-sector data-widget="avisos" gs-w="12" gs-h="18"  data-widget-index="avisos">
                                    <div class="grid-stack-item-content bg-gray-50 border rounded">
                                        <div class="w-56 h-96 p-3 rounded-lg">
                                            <h1 class="text-xl font-bold mb-4">Avisos Gerais</h1>
                                            
                                            <p class="text-sm mb-4">
                                                Regras para uso dos recados clique <a href="#" class="text-blue-500 hover:underline">aqui</a>.
                                            </p>
                                        
                                            <div class="space-y-4">
                                                <div class="flex items-start space-x-2">
                                                    <div>
                                                        <p class="text-sm font-semibold">Usuário em 24/02/2025 às 14:42</p>
                                                        <p class="text-sm text-gray-700">
                                                            Filial 31 estará fechada no dia 25/02/2025 devido ao feriado municipal...
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="my-4 border-gray-300">
                                    
                                                <div class="flex items-start space-x-2">
                                                    <div>
                                                        <p class="text-sm font-semibold">Usuário em 24/02/2025 às 14:42</p>
                                                        <p class="text-sm text-gray-700">
                                                            Filial 31 estará fechada no dia 25/02/2025 devido ao feriado municipal...
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="my-4 border-gray-300">
                                    
                                                <div class="flex items-start space-x-2">
                                                    <div>
                                                        <p class="text-sm font-semibold">Usuário em 24/02/2025 às 14:42</p>
                                                        <p class="text-sm text-gray-700">
                                                            Filial 31 estará fechada no dia 25/02/2025 devido ao feriado municipal...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <hr class="my-4 border-gray-300">
                                        
                                            <div class="text-center">
                                                <a href="#" class="text-sm text-blue-500 hover:underline">Ver todos</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-stack-item z-999" data-category="comunicacao" data-locked-from-sector data-widget="feed" gs-w="12" gs-h="18" data-widget-index="feed">
                                    <div class="grid-stack-item-content bg-gray-50 border rounded">
                                        <div class="p-2 w-56 h-96">
                                            <div class="flex justify-between items-center mb-2">
                                                <div class="flex justify-start space-x-1">
                                                    <img src="https://img.icons8.com/?size=100&id=82751&format=png&color=000000" class="w-4 h-4" alt="Ícone de usuário">
                                                    <div>
                                                        <h5 class="text-xs font-bold">Usuário</h5>
                                                        <h6 class="text-2xs text-gray-500">Jornalista, Cooperja</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="bg-white p-2 rounded-lg">
                                                <p class="text-gray-700 text-xs mb-2 line-clamp-3">
                                                    E a rede de varejo da Cooperja iniciou outra super campanha comemorativa aos 55 anos da cooperativa. A promoção vai premiar clientes e cooperados que comprarem nas lojas agropecuárias. Posto de combustíveis e supermer...
                                                </p>
                                                
                                                <img src="https://picsum.photos/220/120" class="w-full h-auto mb-2" alt="Imagem de exemplo">
                                                
                                                <div class="flex flex-wrap gap-1 text-2xs text-gray-500">
                                                    <span class="flex items-center space-x-1">
                                                        <img src="https://img.icons8.com/?size=100&id=24816&format=png&color=000000" class="w-3 h-3" alt="Ícone de curtidas">
                                                        <span>35</span>
                                                    </span>
                                                    <span class="flex items-center space-x-1">
                                                        <img src="https://img.icons8.com/?size=100&id=143&format=png&color=000000" class="w-3 h-3" alt="Ícone de comentários">
                                                        <span>14</span>
                                                    </span>
                                                    <span class="flex items-center space-x-1">
                                                        <img src="https://img.icons8.com/?size=100&id=58564&format=png&color=000000" class="w-3 h-3" alt="Ícone de compartilhamentos">
                                                        <span>5</span>
                                                    </span>
                                                    <span class="flex items-center space-x-1">
                                                        <img src="https://img.icons8.com/?size=100&id=83134&format=png&color=000000" class="w-3 h-3" alt="Ícone de compartilhamentos">
                                                        <span>5</span>
                                                    </span>
                                                </div>
                                                <small class="text-gray-500 text-2xs block mt-1">Há 3 dias</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categoria Financeiro -->
                <div class="border rounded-lg overflow-hidden mt-4">
                    <button 
                        @click="openCategory === 'financeiro' ? openCategory = null : openCategory = 'financeiro'"
                        class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                    >
                        <div class="flex items-center">
                            <i class="fas fa-coins mr-2 text-gray-600"></i>
                            <span class="font-medium">Financeiro</span>
                        </div>
                        <div class="flex items-center">
                            <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                            id="financeiro-widget-count">0</span>
                            <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                            :class="{ 'transform rotate-180': openCategory === 'financeiro' }"></i>
                        </div>
                    </button>
                    
                    <div x-show="openCategory === 'financeiro'" x-collapse class="bg-white">
                        <div>
                            <div class="grid-stack" id="grid-financeiro" data-category-grid="financeiro">
                                <!-- Widget de Saldo -->
                                <div class="grid-stack-item" data-widget="saldo" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="saldo">
                                    <div class="grid-stack-item-content bg-gray-50 border rounded">
                                        <div class="w-56 h-48 p-3 rounded-lg">
                                            <h1 class="text-xl font-bold mb-4">Saldo Atual</h1>
                                            <div class="text-3xl font-bold text-green-600 mb-2">R$ 25.000,00</div>
                                            <p class="text-sm text-gray-600">Atualizado em: 24/02/2025</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Widget de Despesas -->
                                <div class="grid-stack-item" data-widget="despesas" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="despesas">
                                    <div class="grid-stack-item-content bg-gray-50 border rounded">
                                        <div class="w-56 h-40 p-3 rounded-lg">
                                            <h1 class="text-xl font-bold mb-4">Últimas Despesas</h1>
                                            <div class="space-y-2">
                                                <div class="flex justify-between">
                                                    <span class="text-sm">Aluguel</span>
                                                    <span class="text-sm font-semibold text-red-600">-R$ 5.000,00</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-sm">Folha de Pagamento</span>
                                                    <span class="text-sm font-semibold text-red-600">-R$ 15.000,00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categoria Recursos Humanos -->
                <div class="border rounded-lg overflow-hidden mt-4">
                    <button 
                        @click="openCategory === 'rh' ? openCategory = null : openCategory = 'rh'"
                        class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                    >
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-gray-600"></i>
                            <span class="font-medium">Recursos Humanos</span>
                        </div>
                        <div class="flex items-center">
                            <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                            id="rh-widget-count">0</span>
                            <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                            :class="{ 'transform rotate-180': openCategory === 'rh' }"></i>
                        </div>
                    </button>
                    
                    <div x-show="openCategory === 'rh'" x-collapse class="bg-white">
                        <div>
                            <div class="grid-stack" id="grid-rh" data-category-grid="rh">
                                <!-- Widget de Aniversariantes -->
                                <div class="grid-stack-item" data-category="rh" data-widget="aniversariantes" gs-w="12" gs-h="18" gs-x="0" gs-y="0" data-widget-index="widget">
                                    <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                        <div class="w-full h-full p-4">
                                            <div class="flex justify-between items-center mb-4">
                                                <h1 class="text-xl font-bold text-gray-800">Aniversariantes do Dia</h1>
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Hoje</span>
                                            </div>
                                            
                                            <div class="space-y-4 overflow-y-auto" style="max-height: 300px;">
                                                <!-- Aniversariante 1 -->
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                                            MS
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-semibold text-gray-900 truncate">Maria Silva</p>
                                                        <p class="text-xs text-gray-500">TI · 5 anos na empresa</p>
                                                        <div class="mt-1 flex items-center">
                                                            <i class="fas fa-cake text-pink-500 mr-1 text-xs"></i>
                                                            <span class="text-xs text-gray-600">Faz 32 anos hoje</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <hr class="border-gray-200">
                                                
                                                <!-- Aniversariante 2 -->
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white font-semibold">
                                                            JO
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-semibold text-gray-900 truncate">João Oliveira</p>
                                                        <p class="text-xs text-gray-500">Financeiro · 3 anos na empresa</p>
                                                        <div class="mt-1 flex items-center">
                                                            <i class="fas fa-cake text-pink-500 mr-1 text-xs"></i>
                                                            <span class="text-xs text-gray-600">Faz 28 anos hoje</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <hr class="border-gray-200">
                                                
                                                <!-- Aniversariante 3 -->
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-semibold">
                                                            AS
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-semibold text-gray-900 truncate">Ana Souza</p>
                                                        <p class="text-xs text-gray-500">Marketing · 2 anos na empresa</p>
                                                        <div class="mt-1 flex items-center">
                                                            <i class="fas fa-cake text-pink-500 mr-1 text-xs"></i>
                                                            <span class="text-xs text-gray-600">Faz 25 anos hoje</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <hr class="border-gray-200">
                                                
                                                <!-- Aniversariante 4 -->
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-white font-semibold">
                                                            CS
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-semibold text-gray-900 truncate">Carlos Santos</p>
                                                        <p class="text-xs text-gray-500">RH · 7 anos na empresa</p>
                                                        <div class="mt-1 flex items-center">
                                                            <i class="fas fa-cake text-pink-500 mr-1 text-xs"></i>
                                                            <span class="text-xs text-gray-600">Faz 40 anos hoje</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 text-center">
                                                <a href="#" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 hover:underline">
                                                    Ver todos os aniversariantes
                                                    <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                
                                <!-- Widget de Férias -->
                                <div class="grid-stack-item" data-widget="ferias" gs-w="12" gs-h="10" gs-x="0" gs-y="18" data-widget-index="ferias">
                                    <div class="grid-stack-item-content bg-gray-50 border rounded">
                                        <div class="w-56 h-52 p-3 rounded-lg">
                                            <h1 class="text-xl font-bold mb-4">Próximas Férias</h1>
                                            <div class="space-y-2">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <p class="text-sm font-medium">Carlos Santos</p>
                                                        <p class="text-xs text-gray-500">01/03 - 15/03</p>
                                                    </div>
                                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">2 dias</span>
                                                </div>
                                                <hr class="border-gray-200">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <p class="text-sm font-medium">Patrícia Lima</p>
                                                        <p class="text-xs text-gray-500">05/03 - 20/03</p>
                                                    </div>
                                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">7 dias</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    @filamentScripts

    <script>
        window.isManager = @json($isManager);
        
        document.addEventListener('DOMContentLoaded', function () {

            
            function countWidgets(categoryId) {
                const grid = document.getElementById(`grid-${categoryId}`);
                if (!grid) return 0;
                return grid.querySelectorAll('.grid-stack-item').length;
            }

            // Atualiza todos os contadores
            function updateAllCounters() {
                const categories = ['comunicacao', 'financeiro', 'rh'];
                categories.forEach(category => {
                    const counter = document.getElementById(`${category}-widget-count`);
                    if (counter) {
                        counter.textContent = countWidgets(category);
                    }
                });
            }

            // Observador para detectar mudanças nas grids
            const observer = new MutationObserver(function(mutations) {
                updateAllCounters();
            });

            // Configura o observador para cada grid
            document.querySelectorAll('[data-category-grid]').forEach(grid => {
                observer.observe(grid, {
                    childList: true,
                    subtree: true
                });
            });

            // Atualização inicial
            updateAllCounters();

            // Atualiza quando uma categoria é aberta/fechada
            document.querySelectorAll('[data-category]').forEach(button => {
                button.addEventListener('click', function() {
                    setTimeout(updateAllCounters, 300); // Espera a animação do accordion
                });
            });
            const categoryGrids = document.querySelectorAll('[data-category-grid]');
        
            const categoryGridInstances = {};

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

                    //console.log(`GridStack inicializado para categoria: ${categoryName}`);
                });

                return categoryGridInstances;
            }
            initializeCategoryGrids();  
           
        
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

            function resetLayout() {
                Toast.fire({
                    icon: 'success',
                    title: 'Layout resetado'
                })
                setTimeout(() => {
                    Livewire.dispatch('resetLayout');
                    setTimeout(() => location.reload(), 500);
                }, 2000)
            }

            function getLivewireComponent(widgetIndex) {
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
                minRow: 3,
                acceptWidgets: true,
                float: true,
                disableResize: true,
                disableDrag: true
            }, '#main-dashboard');
    
            let sidebarGrid = GridStack.init({
                float: true,
                disableResize : true,
                acceptWidgets: true,
            }, '#right-sidebar');
            
                        
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
                sidebar.classList.toggle('translate-x-full');
            })
            
            toggleLeftSidebar.addEventListener('click', function(){
                leftSidebar.classList.toggle('hidden')
            })

            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('translate-x-full');

                if (!sidebar.classList.contains('translate-x-full')) {
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
                                    item.widgetCategory = node.el.dataset.category;                
                                }

                                return item;
                            });
                            
                            setDefaultBtn.addEventListener('click', function () {
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
                    if (item && !lockedFromSector) {
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

            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-widget')) {
                    let widget = event.target.closest('.grid-stack-item');
                    let widgetCategory = widget.dataset.category;
                    let widgetIndex = widget.dataset.widgetIndex;
                    
                    let lockedFromSector = widget.dataset.lockedFromSector;
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
                            item.widgetCategory = node.el.dataset.category;                     
                        }

                        return item;
                    });
                    if(isManager === false){
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
                    setDefaultBtn.addEventListener('click', function () {
                        Toast.fire({
                            icon: 'success',
                            title: 'Layout salvo com sucesso!'
                        })
                        setTimeout(() => {
                            Livewire.dispatch('saveLayout', [layoutToSave]);
                            setTimeout(() => location.reload(), 500);
                        }, 2000)
                    });
                }else{
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
                }

            });
            
            const widgetSizes = {
                noticias: { w: 3, h: 5 },
                avisos: { w: 3, h: 5 },
                feed: { w: 9, h: 18, },
                widget: { w: 3, h: 5, },
            };

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
            });
        });
    </script>
</body>
</html>