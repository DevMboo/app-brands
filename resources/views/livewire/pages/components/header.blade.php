<div class="{{ $render ? 'block' : 'hidden' }} flex-wrap sm:justify-center sm:flex-nowrap w-full text-sm py-3">
    <div class="grid grid-cols-3 items-center gap-3">
        <div class="col-span-1">
            <h1 class="text-2xl">Bem vindo, {{$name}}</h1>
        </div>
        <div class="col-span-1">
            <form class="w-96 mx-auto">   
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" wire:model.live="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-2xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Grupos, Bandeiras, Unidades..." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-xl text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Pesquisar</button>
                </div>
            </form>
        </div>
        <div class="col-span-1">
            <div class="bg-white inline-flex gap-3 py-2 w-full max-w-52 me-3 rounded-2xl border border-gray-200 px-2 float-end">
                <div>
                    <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <span class="font-medium text-gray-600 dark:text-gray-300">{{ $initials }}</span>
                    </div>
                </div>
                <div class="flex flex-col truncate ">
                    <p class="font-medium text-nowrap text-ellipsis overflow-hidden w-full">{{ $name }}</p> 
                    <p class="text-xs text-gray-600 text-nowrap text-ellipsis overflow-hidden w-full">{{ $email }}</p> 
                </div>
            </div>
        </div>
    </div>
</div>
