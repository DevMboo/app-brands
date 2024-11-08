<div class="fixed top-0 left-0 w-screen h-screen z-[1040] bg-[rgba(0,0,0,.5)] {{ $render ? 'block' : 'hidden' }}">
    <div class="w-full max-w-lg h-auto min-h-64 bg-white rounded-xl mx-auto my-16">
        <form wire:submit="save">
            <div class="flex items-center">
                <div class="flex justify-between w-full mt-4 border-s-4 border-purple-600">
                    <h1 class="ps-3 font-semibold">Criar nova unidade</h1>
                    <button type="button" @click="$dispatch('dismiss-created-unity')" class="bg-neutral-300 hover:bg-neutral-800 hover:text-white w-8 h-8 me-4 flex justify-center items-center rounded-full">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
            </div>
            <div class="min-h-52 px-3 mt-6 pb-3">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="name_fantasy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Fantasia</label>
                        <input type="text" name="name_fantasy" id="name_fantasy" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name fantasy..." wire:model="name_fantasy">
                        @error('name_fantasy')
                        <p class="text-red-700 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Razão Social</label>
                        <input type="text" name="company_name" id="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Company name..." wire:model="company_name">
                        @error('company_name')
                        <p class="text-red-700 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="cnpj" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CNPJ</label>
                        <input type="text" x-mask="99.999.999/9999-99" name="cnpj" id="cnpj" wire:model="cnpj" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Company name...">
                        @error('cnpj')
                        <p class="text-red-700 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="flag_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bandeira</label>
                        <select id="flag_id" wire:model="flag_id" class="bg-gray-50 border border-gray-300 h-[46px] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Selecione</option>
                            @forelse ($flags as $flag)
                                <option value="{{ $flag->id }}">{{ $flag->name }} | {{ $flag->group->name }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                        @error('flag_id')
                        <p class="text-red-700 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
            </div>
            <div class="flex justify-end gap-1 px-2 border-t border-gray-200 pt-3">
                <button type="button" @click="$dispatch('dismiss-created-unity')" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancelar</button>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirmar</button>
            </div>
        </form>
    </div>
</div>
