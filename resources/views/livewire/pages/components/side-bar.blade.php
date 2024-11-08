<div
    class="-translate-x-full transition-all duration-300 h-screen rounded-e-xl bg-neutral-800 border-neutral-700 transform hidden  top-0 start-0 bottom-0 z-[60] w-64  border-e pt-7 pb-10 overflow-y-auto lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500  {{ $render ? 'md:block lg:block sticky' : 'hidden' }}">
    <div class="px-3 py-2">
        <h2 class="mb-3 text-neutral-400 text-center">MENU</h2>
        <nav class="">
            <ul class="space-y-1.5 ">
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg  {{ request()->routeIs('home') ? 'bg-neutral-700 text-white hover:bg-gray-100' : 'text-neutral-400 hover:bg-neutral-700' }}"
                        href="{{ route('home') }}" wire:navigate>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Página Inicial
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-neutral-400 hover:text-neutral-300 {{ request()->routeIs('group') ? 'bg-neutral-700 text-white hover:bg-gray-100' : 'text-neutral-400 hover:bg-neutral-700' }}"
                        href="{{ route('group') }}" wire:navigate>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-group">
                            <path d="M3 7V5c0-1.1.9-2 2-2h2" />
                            <path d="M17 3h2c1.1 0 2 .9 2 2v2" />
                            <path d="M21 17v2c0 1.1-.9 2-2 2h-2" />
                            <path d="M7 21H5c-1.1 0-2-.9-2-2v-2" />
                            <rect width="7" height="5" x="7" y="7" rx="1" />
                            <rect width="7" height="5" x="10" y="12" rx="1" />
                        </svg>
                        Grupos
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-neutral-400 hover:text-neutral-300 {{ request()->routeIs('flag') ? 'bg-neutral-700 text-white hover:bg-gray-100' : 'text-neutral-400 hover:bg-neutral-700' }}"
                        href="{{ route('flag') }}" wire:navigate>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flag">
                            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
                            <line x1="4" x2="4" y1="22" y2="15" />
                        </svg>
                        Bandeiras
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-neutral-400 hover:text-neutral-300 {{ request()->routeIs('unity') ? 'bg-neutral-700 text-white hover:bg-gray-100' : 'text-neutral-400 hover:bg-neutral-700' }}"
                    href="{{ route('unity') }}" wire:navigate>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash">
                            <line x1="4" x2="20" y1="9" y2="9" />
                            <line x1="4" x2="20" y1="15" y2="15" />
                            <line x1="10" x2="8" y1="3" y2="21" />
                            <line x1="16" x2="14" y1="3" y2="21" />
                        </svg>
                        Unidades
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-neutral-400 hover:text-neutral-300 {{ request()->routeIs('collaborator') ? 'bg-neutral-700 text-white hover:bg-gray-100' : 'text-neutral-400 hover:bg-neutral-700' }}"
                        href="{{ route('collaborator') }}" wire:navigate>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-user-round">
                            <path d="M18 21a6 6 0 0 0-12 0" />
                            <circle cx="12" cy="11" r="4" />
                            <rect width="18" height="18" x="3" y="3" rx="2" />
                        </svg>
                        Colaboradores
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-neutral-400 hover:text-neutral-300 {{ request()->routeIs('report') ? 'bg-neutral-700 text-white hover:bg-gray-100' : 'text-neutral-400 hover:bg-neutral-700' }}"
                    href="{{ route('report') }}" wire:navigate>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-marked">
                            <path d="M10 2v8l3-3 3 3V2" />
                            <path
                                d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                        </svg>
                        Relatórios
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg  hover:bg-neutral-700 text-neutral-400 hover:text-neutral-300 w-full"
                        href="#" wire:click="loggout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-power">
                            <path d="M12 2v10" />
                            <path d="M18.4 6.6a9 9 0 1 1-12.77.04" />
                        </svg>
                        Desconectar
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
