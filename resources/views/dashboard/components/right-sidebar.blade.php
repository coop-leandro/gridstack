<div id="sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 p-4 overflow-y-auto" wire:ignore>
    <h5 class="text-lg font-semibold mb-2">Personalizar Layout</h5>
    <p class="text-gray-600 mb-4">Arraste os blocos para o dashboard.</p>
    <button id="close-sidebar" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4">Fechar</button>
    
    @livewire('search-bar')
    
    <div id="right-sidebar">
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
                            <div class="grid-stack-item z-999" data-category="comunicacao" data-locked-from-sector data-widget="avisos" gs-w="12" gs-h="18" gs-y="" data-widget-index="avisos">
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
                            <div class="grid-stack-item z-999" data-category="comunicacao" data-locked-from-sector data-widget="feed" gs-w="12" gs-h="18" gs-y="0" data-widget-index="feed">
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