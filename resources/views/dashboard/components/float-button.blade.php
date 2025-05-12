<div class="fixed bottom-6 right-6 z-50">
    <!-- Botão principal flutuante -->
    <button id="floating-action-button" style="background-color: #1B5151" class="p-4 text-white rounded-full shadow-lg hover:bg-green-700 transition-all duration-200 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 transform transition-transform duration-200" id="fab-icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
        </svg>
    </button>

    <div id="action-menu" class="hidden absolute bottom-16 right-0 space-y-3 p-1 flex flex-col">
        <button id="modal-save" class="flex items-center justify-center p-3 bg-white text-green-600 rounded-full shadow-md hover:shadow-lg transition-all hover:scale-105 group" title="Salvar Layout">
            <div class="absolute right-full top-1/2 transform -translate-y-1/2 mr-2 bg-white p-2 rounded-lg shadow-lg border border-gray-100 min-w-[160px] hidden group-hover:block">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                    </svg>
                    <span class="text-lg font-medium text-gray-800">Salvar Layout</span>
                </div>
                <div class="text-sm text-gray-500 mt-1 pl-6">Guarda sua configuração atual</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
            </svg>                  
        </button>

        <button id="modal-reset" class="flex items-center justify-center p-3 bg-white text-yellow-600 rounded-full shadow-md hover:shadow-lg transition-all hover:scale-105 group" title="Resetar Layout">
            <div class="absolute right-full top-1/2 transform -translate-y-1/2 mr-2 bg-white p-2 rounded-lg shadow-lg border border-gray-100 min-w-[160px] hidden group-hover:block">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    <span class="text-lg font-medium text-gray-800">Resetar Layout</span>
                </div>
                <div class="text-sm text-gray-500 mt-1 pl-6">Volta para as configurações padrão</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
        </button>
        
        <button id="personalize" class="flex items-center justify-center p-3 bg-white text-blue-600 rounded-full shadow-md hover:shadow-lg transition-all hover:scale-105 group" title="Editar Layout">
            <div class="absolute right-full top-1/2 transform -translate-y-1/2 mr-2 bg-white p-2 rounded-lg shadow-lg border border-gray-100 min-w-[160px] hidden group-hover:block">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    <span class="text-lg font-medium text-gray-800">Editar Layout</span>
                </div>
                <div class="text-sm text-gray-500 mt-1 pl-6">Modifica a disposição dos componentes</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </button>
        
        <button id="toggle-sidebar" class="flex items-center justify-center p-3 bg-white text-gray-600 rounded-full shadow-md hover:shadow-lg transition-all hover:scale-105 group" title="Adicionar Widgets">
            <div class="absolute right-full top-1/2 transform -translate-y-1/2 mr-2 bg-white p-2 rounded-lg shadow-lg border border-gray-100 min-w-[160px] hidden group-hover:block">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="text-lg font-medium text-gray-800">Adicionar Widgets</span>
                </div>
                <div class="text-sm text-gray-500 mt-1 pl-6">Inclui novos componentes ao dashboard</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>
    <div id="save-modal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
            <h2 class="text-2xl font-semibold mb-2">Salvar alterações?</h2>
            <p class="text-lg text-gray-600 mb-4">Todas as alterações no layout serão salvas. Você pode editar novamente a qualquer momento.</p>
            <div class="flex justify-end gap-2">
                <button class="close-modal px-4 py-2 rounded border">Cancelar</button>
                <button id="save-layout" class="px-4 py-2 rounded bg-blue-600 text-white">Salvar</button>
            </div>
            <button class="absolute top-2 right-2 text-gray-500 close-modal">
                &times;
            </button>
        </div>
    </div>

    <div id="reset-modal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
            <h2 class="text-2xl font-semibold mb-2">Resetar layout?</h2>
            <p class="text-lg text-gray-600 mb-4">Todas as alterações no layout serão perdidas. O layout será redefinido para o padrão.</p>
            <div class="flex justify-end gap-2">
                <button class="close-modal px-4 py-2 rounded border">Cancelar</button>
                <button id="reset-layout" class="px-4 py-2 rounded bg-red-600 text-white">Resetar</button>
            </div>
            <button class="absolute top-2 right-2 text-gray-500 close-modal">
                &times;
            </button>
        </div>
    </div>

</div>