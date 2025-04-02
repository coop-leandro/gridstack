<div class="container-fluid flex mt-[90px]">
    <div class="left-sidebar" id="left-sidebar">
        <div class="sidebar-search p-3">
            <input type="text" placeholder="Search" class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <div class="sidebar-section p-3">
            <h3 class="font-bold text-gray-700 mb-2">FERRAMENTAS GERAIS</h3>
            <ul class="list-unstyled">
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Chat</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Calendário</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Recados</a>
                </li>
            </ul>
        </div>

        <div class="sidebar-section p-3">
            <h3 class="font-bold text-gray-700 mb-2">RECURSOS DE SUPORTE</h3>
            <ul class="list-unstyled">
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Jurídico</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Suporte Jurídico</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Controle de Contrato</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Controle Outros Docs</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Suporte Compras</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Suporte TI</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-decoration-none text-dark hover:text-blue-500">Suporte Contabilidade</a>
                </li>
            </ul>
        </div>
    </div>
        <div id="main-dashboard" class="grid-stack">
            @foreach($layout as $item)
                @if (isset($item))
                    <div class="grid-stack-item"
                        gs-w="{{ $item->w }}"
                        gs-h="{{ $item->h }}"
                        gs-x="{{ $item->x }}"
                        gs-y="{{ $item->y }}"
                        data-widget-index = "{{ $item->widgetIndex }}"
                        data-locked-from-sector="{{ $item->locked_from_sector }}"
                        gs-no-move="{{ $item->locked ?? false ? 'true' : 'false' }}"
                        gs-no-resize="{{ $item->locked ?? false ? 'true' : 'false' }}"
                        gs-locked="{{ $item->locked ?? false ? 'true' : 'false' }}"
                        >
                        <div class="grid-stack-item-content p-3 ">
                            <div class="absolute bulk-actions top-2 right-2 flex space-x-2 text-xl">
                                @if($item->locked_from_sector && !$isManager)
                                    <button class="remove-widget p-2 text-red-500 hover:text-red-700 icon-disabled icon-disabled-sector" disabled>
                                        <i class="remove-widget fas fa-times"></i>
                                    </button>
               
                                    <button class="resize-widget p-2 text-green-500 hover:text-green-700 icon-disabled icon-disabled-sector" disabled>
                                        <i class="fas resize-widget fa-expand-arrows-alt"></i>
                                    </button>
                                @elseif($isManager)
                                    <button class="remove-widget p-2 text-red-500 hover:text-red-700">
                                        <i class="remove-widget fas fa-times"></i>
                                    </button>
                                    
                                    <button class="fix-widget p-2 text-yellow-500 hover:text-yellow-700">
                                        <i class="fas fix-widget fa-thumbtack"></i>
                                    </button>
                
                                    <button class="resize-widget p-2 text-green-500 hover:text-green-700">
                                        <i class="fas resize-widget fa-expand-arrows-alt"></i>
                                    </button>
                                @else
                                    <button class="remove-widget p-2 text-red-500 hover:text-red-700">
                                        <i class="remove-widget fas fa-times"></i>
                                    </button>
                                    <button class="resize-widget p-2 text-green-500 hover:text-green-700">
                                        <i class="fas resize-widget fa-expand-arrows-alt"></i>
                                    </button>
                                @endif
                            </div>
                            @if ($item->widgetIndex == 'noticias')
                                @livewire('noticias')
                            @elseif($item->widgetIndex == 'avisos')
                                @livewire('avisos')
                            @elseif($item->widgetIndex == 'feed')
                                @livewire('feeds')
                            @else
                                @livewire('widgets-ex')
                            @endif
                        </div>
                    </div>
                @else   
                    <div>Personalize sua Página</div>
                @endif
            @endforeach
        </div>
    </div>
</div>

