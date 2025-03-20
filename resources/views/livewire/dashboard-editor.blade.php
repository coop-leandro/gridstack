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
        <div id="main-dashboard" class="grid-stack">a
            @foreach($layout as $item)
                @if (isset($item))
                    <div class="grid-stack-item"
                        gs-w="{{ $item->w }}"
                        gs-h="{{ $item->h }}"
                        gs-x="{{ $item->x }}"
                        gs-y="{{ $item->y }}"
                        data-widget-index = "{{ $item->widgetIndex }}"
                        >
                        <div class="grid-stack-item-content p-3 ">
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

