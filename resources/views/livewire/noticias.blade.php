<div data-widget-index="noticias">
    <div class="row">
        {{-- <div class="col-md-3">
            <h3 class="mb-3">Adicionar Notícia</h3>
            <form wire:submit.prevent="createNews" class="card p-3 shadow-sm">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input wire:model="titulo" type="text" id="titulo" class="form-control" placeholder="Digite o título da notícia..." />
                </div>
                <div class="mb-3">
                    <label for="conteudo" class="form-label">Descrição</label>
                    <textarea wire:model="conteudo" id="conteudo" class="form-control" rows="4" placeholder="Digite a descrição da notícia..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Criar Notícia</button>
            </form>
        </div> --}}

        <div class="col-md-12">
            <button class="remove-widget btn btn-danger">
                X
            </button>
            <h3 class="mb-3">📖 Notícias</h3>
            <div class="list-group">
                @foreach ($noticias as $noticia)
                    <div class="list-group-item list-group-item-action flex-column align-items-start shadow-sm mb-2">
                        <h5 class="mb-1">{{ $noticia->titulo }}</h5>
                        <p class="mb-1 text-muted">{{ $noticia->conteudo }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
