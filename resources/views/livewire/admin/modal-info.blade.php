<div class="fixed inset-0 z-10 overflow-y-auto duration-500 ease-out">
    <div class="flex justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <form>
            <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                <x-button class="mt-4 ml-3">
                    <svg wire:loading wire:target="crear()" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="crear()" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-yellow-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5">Guardar</button>
                        Guardar
                    </span>
                </x-button>
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click="cerrarModal()" type="button"
                        class="inline-flex justify-center w-full px-4 py-2 mt-4 ml-3 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-gray-200 border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">Cancelar</button>
                </span>
            </div>

    </div>
    </form>
</div>
</div>

</div>
