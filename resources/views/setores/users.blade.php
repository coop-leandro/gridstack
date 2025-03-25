<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container">
    <h2>Usuários do Setor: {{ $setor->name }}</h2>

    <h3>Gerente: {{ $managerName }}</h3>

    <h4>Adicionar Usuários</h4>
    <form action="{{ route('setores.adicionarUsuarios', $setor->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="usuarios">Selecione os Usuários</label>
            <select name="usuarios[]" id="usuarios" class="form-control" multiple>
                @foreach($todosUsuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar ao Setor</button>
    </form>

    <h4>Usuários Associados</h4>
    <ul>
        @foreach($usuarios as $usuario)
            <li>{{ $usuario->name }}</li>
        @endforeach
    </ul>
</div>