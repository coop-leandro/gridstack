<div data-widget-index="feed">
    <div class="row">

        {{-- <div class="col-md-3">
            <h3 class="mb-3">Adicionar Feed</h3>
            <form wire:submit.prevent="createFeed" class="card p-3 shadow-sm">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input wire:model="titulo" type="text" id="titulo" class="form-control" placeholder="Digite o título do feed..." />
                </div>
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Descrição</label>
                    <textarea wire:model="descricao" id="descricao" class="form-control" rows="2" placeholder="Digite a mensagem do feed..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Criar Feed</button>
            </form>
        </div> --}}

        <div class="col-md-12">
            <button class="remove-widget btn btn-danger">
                X
            </button>
            <h3 class="mb-3">📱 Feed</h3>
            <div class="list-group">
                @foreach ($feeds as $feed)
                    <div class="list-group-item list-group-item-action flex-column align-items-start shadow-sm mb-2">
                        <div class="">
                            <h5 class="mb-1">{{ $feed->titulo }}</h5>
                            <p class="mb-1 text-muted">{{ $feed->descricao }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
