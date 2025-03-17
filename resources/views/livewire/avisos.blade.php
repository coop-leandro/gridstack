<div data-widget-index="avisos">
    <div class="row">

        {{-- <div class="col-md-3">
            <h3 class="mb-3">Adicionar Aviso</h3>
            <form wire:submit.prevent="createNotice" class="card p-3 shadow-sm">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input wire:model="titulo" type="text" id="titulo" class="form-control" placeholder="Digite o título do aviso..." />
                </div>
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Mensagem</label>
                    <textarea wire:model="mensagem" id="mensagem" class="form-control" rows="2" placeholder="Digite a mensagem do aviso..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Criar Aviso</button>
            </form>
        </div> --}}

        <div class="col-md-12">
            <button class="remove-widget btn btn-danger">
                X
            </button>
            <h3 class="mb-3">🚨 Avisos</h3>
            <div class="list-group">
                @foreach ($avisos as $aviso)
                    <div class="list-group-item list-group-item-action flex-column align-items-start shadow-sm mb-2">
                        <h5 class="mb-1">{{ $aviso->titulo }}</h5>
                        <p class="mb-1 text-muted">{{ $aviso->mensagem }}</p>
                        <button wire:click="deleteNotice({{ $aviso->id }})" class="btn btn-danger deleteAviso ">X</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
