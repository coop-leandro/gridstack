@extends('layouts.app')

@section('content')
    @livewire('dashboard-editor')
    
    <header class="flex justify-between header items-center px-4 py-3 bg-white">
        <div class="flex items-center">
            <button id="toggle-left-sidebar" class="bg-white border-0 rounded-full ms-3 p-2 shadow-sm hover:bg-gray-50">
                <img src="https://img.icons8.com/?size=100&id=36389&format=png&color=000000" alt="Ícone de Menu" class="w-6 h-6">
            </button>  
        </div>
        <div class="flex items-center gap-3">
            @if ($isManager)
                <div>
                    <button id="set-default" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Setar Default</button>
                </div>
            @else
                <div>
                    <button id="save-layout" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Salvar Layout</button>
                </div>
            @endif
    
            <div>                
                <button id="toggle-sidebar" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Adicionar Widgets</button>
            </div>

            <div>
                <button id="personalize" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Editar</button>
            </div>
    
            <div>
                <button id="reset-layout" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Resetar Layout</button>
            </div>    
        </div>
    </header>
    
    @include('dashboard.components.right-sidebar')
    
    @if ($isManager)
        @livewire('widget-logs')
    @endif

    @push('scripts')
        <script>
            window.isManager = @json($isManager);
        </script>
        @include('dashboard.scripts.dashboard')
    @endpush
@endsection