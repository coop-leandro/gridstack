<div id="sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 p-4 overflow-y-auto" wire:ignore>
    <h5 class="text-lg font-semibold mb-2">Personalizar Layout</h5>
    <p class="text-gray-600 mb-4">Arraste os blocos para o dashboard.</p>
    <button id="close-sidebar" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4">Fechar</button>
    
    @livewire('search-bar')
    
    <div id="right-sidebar">
        <div class="space-y-4" x-data="{ openCategory: null }">
            <div class="border rounded-lg overflow-hidden shadow-sm" data-category-lazy>
                <button 
                    @click="openCategory === 'comunicacao' ? openCategory = null : openCategory = 'comunicacao'"
                    class="w-full flex items-center justify-between p-4"
                >
                    <div class="flex items-center">
                        <i class="fas fa-bullhorn mr-3 text-blue-600 bg-blue-100 p-2 rounded-full"></i>
                        <span class="font-medium text-gray-800">Comunicação</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full ml-2 shadow-sm" 
                        id="comunicacao-widget-count">2</span>
                        <i class="fas fa-chevron-down ml-3 text-gray-500 transition-transform duration-200" 
                            :class="{ 'transform rotate-180': openCategory === 'comunicacao' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'comunicacao'" x-collapse class="bg-white accordion-content">
                    <div>
                        <div class="grid-stack p-3" id="grid-comunicacao" data-category-grid="comunicacao">
                            <div class="grid-stack-item z-999" data-origin="sidebar" data-category="comunicacao" data-locked-from-sector data-widget="avisos" gs-w="12" gs-h="18" gs-y="" data-widget-index="avisos">
                                <div class="grid-stack-item-content bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-blue-200">
                                    <div class="w-full h-full p-4">
                                        <div class="flex justify-between items-center mb-4">
                                            <h1 class="text-xl font-bold text-gray-800 flex items-center">
                                                <i class="fas fa-bell text-blue-500 mr-2"></i>
                                                Avisos Gerais
                                            </h1>
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Atualizado</span>
                                        </div>
                                        
                                        <p class="text-sm text-gray-600 mb-4">
                                            Regras para uso dos recados clique <a href="#" class="text-blue-500 hover:underline font-medium">aqui</a>.
                                        </p>
                                    
                                        <div class="space-y-4">
                                            <!-- Aviso 1 -->
                                            <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                                <div class="flex items-start space-x-3">
                                                    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                                                    <div>
                                                        <p class="text-sm font-semibold text-gray-800">Usuário em 24/02/2025 às 14:42</p>
                                                        <p class="text-sm text-gray-700 mt-1">
                                                            Filial 31 estará fechada no dia 25/02/2025 devido ao feriado municipal...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <!-- Aviso 2 -->
                                            <div class="bg-yellow-50 p-3 rounded-lg border border-yellow-100">
                                                <div class="flex items-start space-x-3">
                                                    <i class="fas fa-exclamation-circle text-yellow-500 mt-1"></i>
                                                    <div>
                                                        <p class="text-sm font-semibold text-gray-800">Usuário em 23/02/2025 às 09:15</p>
                                                        <p class="text-sm text-gray-700 mt-1">
                                                            Manutenção programada para o sistema no sábado às 14h...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="mt-6 text-center">
                                            <a href="#" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium">
                                                Ver todos os avisos
                                                <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid-stack-item z-999" data-origin="sidebar" data-category="comunicacao" data-locked-from-sector data-widget="feed" gs-w="12" gs-h="18" gs-y="0" data-widget-index="feed">
                                <div class="grid-stack-item-content bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-blue-200">
                                    <div class="w-full h-full p-4">
                                        <div class="flex justify-between items-center mb-4">
                                            <h1 class="text-xl font-bold text-gray-800 flex items-center">
                                                <i class="fas fa-newspaper text-green-500 mr-2"></i>
                                                Feed Corporativo
                                            </h1>
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Novo</span>
                                        </div>
                                    
                                        <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-xs">
                                            <div class="flex items-center space-x-3 mb-3">
                                                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                                    U
                                                </div>
                                                <div>
                                                    <h5 class="text-sm font-bold text-gray-800">Usuário</h5>
                                                    <h6 class="text-xs text-gray-500">Jornalista, Cooperja</h6>
                                                </div>
                                            </div>
                                        
                                            <p class="text-gray-700 text-sm mb-3">
                                                E a rede de varejo da Cooperja iniciou outra super campanha comemorativa aos 55 anos da cooperativa. A promoção vai premiar clientes e cooperados que comprarem nas lojas agropecuárias. Posto de combustíveis e supermer...
                                            </p>
                                            
                                            <img src="https://picsum.photos/500/300" class="w-full h-auto rounded-lg mb-3" alt="Imagem de exemplo">
                                            
                                            <div class="flex flex-wrap gap-3 text-xs text-gray-500">
                                                <span class="flex items-center space-x-1 hover:text-blue-500 cursor-pointer">
                                                    <i class="far fa-thumbs-up"></i>
                                                    <span>35</span>
                                                </span>
                                                <span class="flex items-center space-x-1 hover:text-blue-500 cursor-pointer">
                                                    <i class="far fa-comment"></i>
                                                    <span>14</span>
                                                </span>
                                                <span class="flex items-center space-x-1 hover:text-blue-500 cursor-pointer">
                                                    <i class="fas fa-share"></i>
                                                    <span>5</span>
                                                </span>
                                            </div>
                                            <small class="text-gray-400 text-xs block mt-2"><i class="far fa-clock mr-1"></i>Há 3 dias</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Financeiro -->
            <div class="border rounded-lg overflow-hidden shadow-sm mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'financeiro' ? openCategory = null : openCategory = 'financeiro'"
                    class="w-full flex items-center justify-between p-4"
                >
                    <div class="flex items-center">
                        <i class="fas fa-coins mr-3 text-green-600 bg-green-100 p-2 rounded-full"></i>
                        <span class="font-medium text-gray-800">Financeiro</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-green-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full ml-2 shadow-sm" 
                        id="financeiro-widget-count">2</span>
                        <i class="fas fa-chevron-down ml-3 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'financeiro' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'financeiro'" x-collapse class="bg-white accordion-content">
                    <div>
                        <div class="grid-stack p-3" id="grid-financeiro" data-category-grid="financeiro">
                            <!-- Widget de Saldo -->
                            <div class="grid-stack-item" data-origin="sidebar" data-widget="saldo" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="saldo">
                                <div class="grid-stack-item-content bg-white border border-gray-200 rounded-xl overflow-hidden ">
                                    <div class="w-full h-full p-4">
                                        <div class="flex justify-between items-center mb-3">
                                            <h1 class="text-lg font-bold text-gray-800 flex items-center">
                                                <i class="fas fa-wallet text-green-500 mr-2"></i>
                                                Saldo Atual
                                            </h1>
                                            <i class="fas fa-sync-alt text-gray-400 text-sm cursor-pointer"></i>
                                        </div>
                                        <div class="text-3xl font-bold text-green-600 mb-1">R$ 25.000,00</div>
                                        <p class="text-sm text-gray-500"><i class="far fa-calendar-alt mr-1"></i>Atualizado em: 24/02/2025</p>
                                        
                                        <div class="mt-4 pt-3 border-t border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">Disponível</span>
                                                <span class="text-sm font-semibold text-green-600">R$ 18.500,00</span>
                                            </div>
                                            <div class="flex justify-between items-center mt-1">
                                                <span class="text-sm text-gray-600">Bloqueado</span>
                                                <span class="text-sm font-semibold text-yellow-600">R$ 6.500,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Widget de Despesas -->
                            <div class="grid-stack-item" data-origin="sidebar" data-widget="despesas" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="despesas">
                                <div class="grid-stack-item-content bg-white border border-gray-200 rounded-xl overflow-hidden ">
                                    <div class="w-full h-full p-4">
                                        <div class="flex justify-between items-center mb-3">
                                            <h1 class="text-lg font-bold text-gray-800 flex items-center">
                                                <i class="fas fa-receipt text-red-500 mr-2"></i>
                                                Últimas Despesas
                                            </h1>
                                            <a href="#" class="text-xs text-blue-500 ">Ver todas</a>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center p-2 rounded-lg">
                                                <div class="flex items-center">
                                                    <i class="fas fa-home text-gray-400 mr-2"></i>
                                                    <span class="text-sm text-gray-700">Aluguel</span>
                                                </div>
                                                <span class="text-sm font-semibold text-red-600">-R$ 5.000,00</span>
                                            </div>
                                            <div class="flex justify-between items-center p-2 rounded-lg">
                                                <div class="flex items-center">
                                                    <i class="fas fa-users text-gray-400 mr-2"></i>
                                                    <span class="text-sm text-gray-700">Folha de Pagamento</span>
                                                </div>
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
            
            <!-- RH -->
            <div class="border rounded-lg overflow-hidden shadow-sm mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'rh' ? openCategory = null : openCategory = 'rh'"
                    class="w-full flex items-center justify-between p-4 "
                >
                    <div class="flex items-center">
                        <i class="fas fa-users mr-3 text-purple-600 bg-purple-100 p-2 rounded-full"></i>
                        <span class="font-medium text-gray-800">Recursos Humanos</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-purple-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full ml-2 shadow-sm" 
                        id="rh-widget-count">2</span>
                        <i class="fas fa-chevron-down ml-3 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'rh' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'rh'" x-collapse class="bg-white accordion-content">
                    <div>
                        <div class="grid-stack p-3" id="grid-rh" data-category-grid="rh">
                            <!-- Widget de Aniversariantes -->
                            <div class="grid-stack-item" data-origin="sidebar" data-category="rh" data-widget="aniversariantes" gs-w="12" gs-h="18" gs-x="0" gs-y="0" data-widget-index="widget">
                                <div class="grid-stack-item-content bg-white border border-gray-200 rounded-xl overflow-hidden">
                                    <div class="w-full h-full p-4">
                                        <div class="flex justify-between items-center mb-4">
                                            <h1 class="text-xl font-bold text-gray-800 flex items-center">
                                                <i class="fas fa-birthday-cake text-pink-500 mr-2"></i>
                                                Aniversariantes do Dia
                                            </h1>
                                            <span class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Hoje</span>
                                        </div>
                                        
                                        <div class="space-y-4 overflow-y-auto" style="max-height: 300px;">
                                            <!-- Aniversariante 1 -->
                                            <div class="flex items-start space-x-3 p-2 rounded-lg transition-colors">
                                                <div class="flex-shrink-0">
                                                    <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold shadow-sm">
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
                                            
                                            <hr class="border-gray-100">
                                            
                                            <!-- Aniversariante 2 -->
                                            <div class="flex items-start space-x-3 p-2 rounded-lg transition-colors">
                                                <div class="flex-shrink-0">
                                                    <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white font-semibold shadow-sm">
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
                                            
                                            <hr class="border-gray-100">
                                            
                                            <!-- Aniversariante 3 -->
                                            <div class="flex items-start space-x-3 p-2 rounded-lg transition-colors">
                                                <div class="flex-shrink-0">
                                                    <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-semibold shadow-sm">
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
                                        </div>
                                        
                                        <div class="mt-4 text-center">
                                            <a href="#" class="inline-flex items-center text-sm text-blue-600 font-medium">
                                                Ver todos os aniversariantes
                                                <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Widget de Férias -->
                            <div class="grid-stack-item" data-origin="sidebar" data-widget="ferias" gs-w="12" gs-h="10" gs-x="0" gs-y="18" data-widget-index="ferias">
                                <div class="grid-stack-item-content bg-white border border-gray-200 rounded-xl overflow-hidden">
                                    <div class="w-full h-full p-4">
                                        <div class="flex justify-between items-center mb-4">
                                            <h1 class="text-xl font-bold text-gray-800 flex items-center">
                                                <i class="fas fa-umbrella-beach text-yellow-500 mr-2"></i>
                                                Próximas Férias
                                            </h1>
                                            <a href="#" class="text-xs text-blue-500">Ver todas</a>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center p-2 ">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-800">Carlos Santos</p>
                                                    <p class="text-xs text-gray-500">01/03 - 15/03</p>
                                                </div>
                                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">2 dias</span>
                                            </div>
                                            <hr class="border-gray-100">
                                            <div class="flex justify-between items-center p-2">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-800">Patrícia Lima</p>
                                                    <p class="text-xs text-gray-500">05/03 - 20/03</p>
                                                </div>
                                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">7 dias</span>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.querySelector("#sidebar");
        const lazyCategories = [...document.querySelectorAll('[data-category-lazy]')];
        const itemsPerLoad = 10;
        let loadedCount = 0;
    
        function loadMoreCategories() {
            const nextItems = lazyCategories.slice(loadedCount, loadedCount + itemsPerLoad);
            nextItems.forEach(item => item.style.display = "block");
            loadedCount += nextItems.length;
        }
    
        lazyCategories.forEach((item, index) => {
            item.style.display = index < itemsPerLoad ? "block" : "none";
        });
        loadedCount = itemsPerLoad;
    
        sidebar.addEventListener("scroll", () => {
            const scrollBottom = sidebar.scrollTop + sidebar.clientHeight;
            const totalHeight = sidebar.scrollHeight;
    
            if (scrollBottom + 100 >= totalHeight) {
                loadMoreCategories();
            }
        });
    });
</script>
    