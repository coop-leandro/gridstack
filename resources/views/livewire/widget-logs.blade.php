<div class="container mt-5">
    <h2 class="mb-3">📊 Estatísticas de Uso dos Widgets</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Widget</th>
                <th>Quantidade de Uso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ ucfirst($log->widget_index) }}</td>
                    <td>{{ $log->usage_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
