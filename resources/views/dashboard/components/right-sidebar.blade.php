<div id="sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 p-4 overflow-y-auto" wire:ignore>
    <h5 class="text-lg font-semibold mb-2">Personalizar Layout</h5>
    <p class="text-gray-600 mb-4">Arraste os blocos para o dashboard.</p>
    <button id="close-sidebar" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4">Fechar</button>
    
    @livewire('search-bar')
    
    <div id="right-sidebar">
        <div class="space-y-4" x-data="{ openCategory: null }">
            <div class="border rounded-lg overflow-hidden" data-category-lazy>
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
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
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
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
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
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'ti' ? openCategory = null : openCategory = 'ti'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-laptop-code mr-2 text-gray-600"></i>
                        <span class="font-medium">Tecnologia</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="ti-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'ti' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'ti'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-ti" data-category-grid="ti">
                            <!-- Widget de Chamados -->
                            <div class="grid-stack-item" data-category="ti" data-widget="chamados" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="chamados">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Chamados Abertos</h1>
                                        <ul class="text-sm space-y-2">
                                            <li>Impressora não funciona - #1023</li>
                                            <li>Erro no sistema RH - #1045</li>
                                            <li>Acesso ao servidor - #1051</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Manutenções -->
                            <div class="grid-stack-item" data-category="ti" data-widget="manutencao" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="manutencao">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Manutenções Programadas</h1>
                                        <p class="text-sm">Atualização de servidor - 25/04/2025</p>
                                        <p class="text-sm">Backup de dados - 27/04/2025</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'marketing' ? openCategory = null : openCategory = 'marketing'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-bullhorn mr-2 text-gray-600"></i>
                        <span class="font-medium">Marketing</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="marketing-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'marketing' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'marketing'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-marketing" data-category-grid="marketing">
                            <!-- Widget de Campanhas Ativas -->
                            <div class="grid-stack-item" data-category="marketing" data-widget="campanhas" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="campanhas">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Campanhas Ativas</h1>
                                        <ul class="text-sm space-y-2">
                                            <li>Campanha Dia das Mães - 12% de CTR</li>
                                            <li>Promoção de Outono - 8.7% de conversão</li>
                                            <li>Google Ads - 1.2k cliques semanais</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Redes Sociais -->
                            <div class="grid-stack-item" data-category="marketing" data-widget="redes" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="redes">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Redes Sociais</h1>
                                        <p class="text-sm">Instagram: +320 seguidores essa semana</p>
                                        <p class="text-sm">LinkedIn: 5 novas conexões corporativas</p>
                                        <p class="text-sm">Facebook: 2 campanhas ativas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'logistica' ? openCategory = null : openCategory = 'logistica'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-truck mr-2 text-gray-600"></i>
                        <span class="font-medium">Logística</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="logistica-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'logistica' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'logistica'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-logistica" data-category-grid="logistica">
                            <!-- Widget de Entregas do Dia -->
                            <div class="grid-stack-item" data-category="logistica" data-widget="entregas" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="entregas">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Entregas do Dia</h1>
                                        <ul class="text-sm space-y-2">
                                            <li>Pedido #4581 - São Paulo - Em rota</li>
                                            <li>Pedido #4592 - Curitiba - Entregue</li>
                                            <li>Pedido #4601 - Porto Alegre - Atrasado</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Estoques -->
                            <div class="grid-stack-item" data-category="logistica" data-widget="estoques" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="estoques">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Nível de Estoques</h1>
                                        <p class="text-sm">Armazém SP: 78% de capacidade</p>
                                        <p class="text-sm">Armazém RJ: 45% de capacidade</p>
                                        <p class="text-sm">Armazém MG: 60% de capacidade</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'administrativo' ? openCategory = null : openCategory = 'administrativo'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-briefcase mr-2 text-gray-600"></i>
                        <span class="font-medium">Administrativo</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="administrativo-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'administrativo' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'administrativo'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-administrativo" data-category-grid="administrativo">
                            <!-- Widget de Documentos -->
                            <div class="grid-stack-item" data-category="administrativo" data-widget="documentos" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="documentos">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Documentos Recentes</h1>
                                        <ul class="text-sm space-y-2">
                                            <li>Contrato de aluguel - Atualizado</li>
                                            <li>Licença de funcionamento - Renovada</li>
                                            <li>Procuração - Revisada</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Atas -->
                            <div class="grid-stack-item" data-category="administrativo" data-widget="atas" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="atas">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Últimas Atas</h1>
                                        <p class="text-sm">Reunião de diretoria - 20/04</p>
                                        <p class="text-sm">Reunião de orçamento - 18/04</p>
                                        <p class="text-sm">Assembleia geral - 15/04</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'comercial' ? openCategory = null : openCategory = 'comercial'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-chart-line mr-2 text-gray-600"></i>
                        <span class="font-medium">Comercial</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="comercial-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'comercial' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'comercial'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-comercial" data-category-grid="comercial">
                            <!-- Widget de Vendas -->
                            <div class="grid-stack-item" data-category="comercial" data-widget="vendas" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="vendas">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Resumo de Vendas</h1>
                                        <p class="text-sm">Hoje: R$ 18.300</p>
                                        <p class="text-sm">Mês atual: R$ 320.000</p>
                                        <p class="text-sm">Meta: R$ 500.000</p>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Oportunidades -->
                            <div class="grid-stack-item" data-category="comercial" data-widget="oportunidades" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="oportunidades">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Oportunidades em Aberto</h1>
                                        <ul class="text-sm space-y-2">
                                            <li>Cliente X - R$ 45.000</li>
                                            <li>Cliente Y - R$ 15.500</li>
                                            <li>Cliente Z - R$ 22.000</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'juridico' ? openCategory = null : openCategory = 'juridico'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-gavel mr-2 text-gray-600"></i>
                        <span class="font-medium">Jurídico</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="juridico-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'juridico' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'juridico'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-juridico" data-category-grid="juridico">
                            <!-- Widget de Processos Ativos -->
                            <div class="grid-stack-item" data-category="juridico" data-widget="processos" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="processos">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Processos Ativos</h1>
                                        <ul class="text-sm space-y-2">
                                            <li>Processo 4578/2023 - Trabalhista</li>
                                            <li>Processo 9821/2024 - Tributário</li>
                                            <li>Processo 1033/2022 - Civil</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Prazos Legais -->
                            <div class="grid-stack-item" data-category="juridico" data-widget="prazos" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="prazos">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Prazos Legais</h1>
                                        <p class="text-sm">Entrega de defesa - 26/04</p>
                                        <p class="text-sm">Prazo para recurso - 30/04</p>
                                        <p class="text-sm">Audiência preliminar - 03/05</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'qualidade' ? openCategory = null : openCategory = 'qualidade'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-gray-600"></i>
                        <span class="font-medium">Qualidade</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="qualidade-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'qualidade' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'qualidade'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-qualidade" data-category-grid="qualidade">
                            <!-- Widget de Auditorias -->
                            <div class="grid-stack-item" data-category="qualidade" data-widget="auditorias" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="auditorias">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Auditorias Internas</h1>
                                        <p class="text-sm">Última auditoria: 10/04/2025</p>
                                        <p class="text-sm">Próxima agendada: 12/05/2025</p>
                                        <p class="text-sm">Status: Preparação</p>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Não Conformidades -->
                            <div class="grid-stack-item" data-category="qualidade" data-widget="nc" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="nc">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Não Conformidades</h1>
                                        <ul class="text-sm list-disc list-inside">
                                            <li>Processo de embalagem</li>
                                            <li>Controle de validade</li>
                                            <li>Rastreabilidade incompleta</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'operacoes' ? openCategory = null : openCategory = 'operacoes'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-cogs mr-2 text-gray-600"></i>
                        <span class="font-medium">Operações</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="operacoes-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'operacoes' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'operacoes'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-operacoes" data-category-grid="operacoes">
                            <!-- Widget de Produção -->
                            <div class="grid-stack-item" data-category="operacoes" data-widget="producao" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="producao">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Status da Produção</h1>
                                        <p class="text-sm">Turno A: 75% concluído</p>
                                        <p class="text-sm">Turno B: 42% concluído</p>
                                        <p class="text-sm">Meta diária: 1.200 peças</p>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Paradas -->
                            <div class="grid-stack-item" data-category="operacoes" data-widget="paradas" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="paradas">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Paradas Técnicas</h1>
                                        <ul class="text-sm list-disc list-inside">
                                            <li>Máquina 01: manutenção agendada</li>
                                            <li>Máquina 03: parada inesperada</li>
                                            <li>Máquina 07: revisão em andamento</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden mt-4" data-category-lazy>
                <button 
                    @click="openCategory === 'projetos' ? openCategory = null : openCategory = 'projetos'"
                    class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                    <div class="flex items-center">
                        <i class="fas fa-tasks mr-2 text-gray-600"></i>
                        <span class="font-medium">Projetos</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full ml-2" 
                        id="projetos-widget-count">0</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 transition-transform duration-200" 
                        :class="{ 'transform rotate-180': openCategory === 'projetos' }"></i>
                    </div>
                </button>
                
                <div x-show="openCategory === 'projetos'" x-collapse class="bg-white">
                    <div>
                        <div class="grid-stack" id="grid-projetos" data-category-grid="projetos">
                            <!-- Widget de Cronograma -->
                            <div class="grid-stack-item" data-category="projetos" data-widget="cronograma" gs-w="12" gs-h="10" gs-x="0" gs-y="0" data-widget-index="cronograma">
                                <div class="grid-stack-item-content bg-gray-50 border rounded-lg">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Cronograma de Projetos</h1>
                                        <p class="text-sm">Projeto Alfa - Fase 3 (execução)</p>
                                        <p class="text-sm">Projeto Beta - Fase 1 (iniciação)</p>
                                        <p class="text-sm">Projeto Gama - Fase 4 (encerramento)</p>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Widget de Riscos -->
                            <div class="grid-stack-item" data-category="projetos" data-widget="riscos" gs-w="12" gs-h="8" gs-x="0" gs-y="10" data-widget-index="riscos">
                                <div class="grid-stack-item-content bg-gray-50 border rounded">
                                    <div class="w-full h-full p-4">
                                        <h1 class="text-xl font-bold text-gray-800 mb-4">Riscos Identificados</h1>
                                        <ul class="text-sm list-disc list-inside">
                                            <li>Falta de recursos</li>
                                            <li>Dependência externa crítica</li>
                                            <li>Prazo de entrega apertado</li>
                                        </ul>
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
    