<div class="col-span-4 md:col-span-1 relative">
    <a href="#"
        class="w-full h-28 px-3 flex items-center gap-3 relative bg-white group hover:bg-neutral-700 hover:text-neutral-400 rounded-2xl border border-gray-200">
        <svg class="size-12" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-hash">
            <line x1="4" x2="20" y1="9" y2="9" />
            <line x1="4" x2="20" y1="15" y2="15" />
            <line x1="10" x2="8" y1="3" y2="21" />
            <line x1="16" x2="14" y1="3" y2="21" />
        </svg>
        <div class="flex flex-col w-full truncate">
            <p class="text-sm mt-4 text-neutral-700 group-hover:text-white">Bandeira: {{ $unity->flag->name }}</p>
            <p class="text-ellipsis overflow-hidden w-full">
                {{ $unity->name_fantasy }}
            </p>
            <p class="text-sm text-neutral-700 group-hover:text-white">{{ $unity->cnpj }}</p>
            <p class="text-xs text-neutral-500 text-end">
                {{ \Carbon\Carbon::parse($unity->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </a>

    <div class="absolute top-2 right-2" x-data="{ expanded: false }">
        <button @click="expanded = !expanded"
            class="bg-transparent hover:bg-slate-200 rounded-xl w-8 h-8 text-center flex justify-center items-center">
            <svg class="size-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-ellipsis">
                <circle cx="12" cy="12" r="1" />
                <circle cx="19" cy="12" r="1" />
                <circle cx="5" cy="12" r="1" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div x-show="expanded" @click.outside="expanded = false"
            class="absolute top-full right-2 z-40 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg p-2">
            <ul class="text-gray-700">
                <li><a href="#" @click="$dispatch('show-view-unity', { id: {{ $unity->id }} })"
                        class="text-sm w-full flex gap-2 px-4 py-2 hover:bg-gray-100 rounded">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                            <path
                                d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        Visualizar</a></li>
                <li><a href="#" @click="$dispatch('show-editabled-unity', { id: {{ $unity->id }} })"
                        class="text-sm w-full flex gap-2 px-4 py-2 hover:bg-gray-100 rounded">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line">
                            <path
                                d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2" />
                            <path
                                d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            <path d="M8 18h1" />
                        </svg>
                        Editar</a></li>
                <li><a href="#" @click="$dispatch('show-delete-unity', { id: {{ $unity->id }} })"
                        class="text-sm w-full flex gap-2 px-4 py-2 hover:bg-gray-100 rounded">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                        Deletar</a></li>
            </ul>
        </div>
    </div>
</div>
