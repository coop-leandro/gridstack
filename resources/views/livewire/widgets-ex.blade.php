<div data-widget-index="widget">
    <div class="row">
        {{-- <div class="col-md-3">
            <h3 class="mb-3">Adicionar Exemplo</h3>
            <form wire:submit.prevent="createInfo" class="card p-3 shadow-sm">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input wire:model="titulo" type="text" id="titulo" class="form-control" placeholder="Digite o título exemplo..." />
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea wire:model="descricao" id="descricao" class="form-control" rows="4" placeholder="Digite a descrição..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Criar Exemplo</button>
            </form>
        </div> --}}

        <div class="col-md-12">
            <button class="remove-widget btn btn-danger">
                X
            </button>
            <h3 class="mb-3">Widget Exemplo</h3>
            <div class="list-group">
                @foreach ($infos as $info)
                    <div class="list-group-item list-group-item-action flex-column align-items-start shadow-sm mb-2">
                        <h5 class="mb-1">{{ $info->titulo }}</h5>
                        <p class="mb-1 text-muted">{{ $info->descricao }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
