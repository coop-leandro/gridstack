<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <div id="main-dashboard" class="grid-stack">
                @foreach($layout as $item)
                    @if (isset($item))
                        <div class="grid-stack-item"
                            gs-w="{{ $item->w }}"
                            gs-h="{{ $item->h }}"
                            gs-x="{{ $item->x }}"
                            gs-y="{{ $item->y }}"
                            data-widget-index = "{{ $item->widgetIndex }}"
                            >
                            <div class="grid-stack-item-content bg-light p-3 border">
                                {!! $item->content !!}
                            </div>
                        </div>
                    @else   
                        <div>Personalize sua Página</div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

