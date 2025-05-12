@extends('layouts.app')

@section('content')

    @livewire('dashboard-editor')
    
    <header id="header-principal" class="flex justify-between header items-center px-4 py-3 bg-white">
        <div class="flex items-center">
            <button id="toggle-left-sidebar" class="bg-white border-0 rounded-full ms-3 p-2 shadow-sm hover:bg-gray-50">
                <img src="https://img.icons8.com/?size=100&id=36389&format=png&color=000000" alt="Ícone de Menu" class="w-6 h-6">
            </button>  
        </div>
    </header>

    <header id="header-edicao" class="flex items-center justify-between header pl-[30px] p-2 border-b hidden">
        <div class="flex items-center space-x-2">
            <div class="bg-blue-500 text-white p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-900 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </div>
            <span class="font-semibold">Modo Edição</span>
        </div>
        <div class="flex items-center space-x-2">
            <button id="edit-cancelar" class="px-4 py-2 border border-gray-400 rounded hover:bg-gray-100">Cancelar</button>
            <button id="modal-save-open" class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Salvar</button>
        </div>
    </header>

    @include('dashboard.components.float-button')
    @include('dashboard.components.right-sidebar')

    @push('scripts')
        @include('dashboard.scripts.dashboard')
    @endpush
@endsection