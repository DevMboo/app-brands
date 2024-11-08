<div class="col-span-4 md:col-span-1 relative">
    <a href="#"
        class="w-full h-28 px-3 flex items-center gap-3 relative bg-white hover:bg-neutral-700 hover:text-neutral-400 rounded-2xl border border-gray-200">
        <svg class="size-12" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-group">
            <path d="M3 7V5c0-1.1.9-2 2-2h2" />
            <path d="M17 3h2c1.1 0 2 .9 2 2v2" />
            <path d="M21 17v2c0 1.1-.9 2-2 2h-2" />
            <path d="M7 21H5c-1.1 0-2-.9-2-2v-2" />
            <rect width="7" height="5" x="7" y="7" rx="1" />
            <rect width="7" height="5" x="10" y="12" rx="1" />
        </svg>
        <div class="flex flex-col w-full truncate">
            <p class="text-ellipsis overflow-hidden w-full">
                {{ $group->name }}
            </p>
            <p class="text-xs text-neutral-500 text-end">
                {{ \Carbon\Carbon::parse($group->created_at)->format('d/m/Y H:i') }}</p>
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
                <li><a href="#" @click="$dispatch('show-view-group', { id: {{$group->id}} })" class="text-sm w-full flex gap-2 px-4 py-2 hover:bg-gray-100 rounded">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                    Visualizar</a></li>
                <li><a href="#" @click="$dispatch('show-editabled-group', { id: {{$group->id}} })" class="text-sm w-full flex gap-2 px-4 py-2 hover:bg-gray-100 rounded">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line"><path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"/><path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><path d="M8 18h1"/></svg>
                    Editar</a></li>
                <li><a href="#" @click="$dispatch('show-delete-group', { id: {{$group->id}} })" class="text-sm w-full flex gap-2 px-4 py-2 hover:bg-gray-100 rounded">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                    Deletar</a></li>
            </ul>
        </div>
    </div>
</div>
