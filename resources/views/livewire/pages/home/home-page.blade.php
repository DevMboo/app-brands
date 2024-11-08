<div>
    <div class="flex md:grid grid-cols-4 mb-2 gap-3 me-3 md:overflow-hidden overflow-x-auto scrollbar-none">

        <livewire:pages.components.card-progress :title="'Grupos Ativos'" :total="$totals['groups']" :ico="'assets/icons/groups.svg'" />

        <livewire:pages.components.card-progress :title="'Bandeiras Ativas'" :total="$totals['flags']" :ico="'assets/icons/flags.svg'" />

        <livewire:pages.components.card-progress :title="'Unidades Ativas'" :total="$totals['unitys']" :ico="'assets/icons/unity.svg'" />

        <livewire:pages.components.card-progress :title="'Colaboradores'" :total="$totals['collaborators']" :ico="'assets/icons/members.svg'" />

    </div>

    <div class="min-h-screen w-full bg-slate-100 rounded-s-2xl">
        <div class="w-full px-3 py-4 relative">
            <div class="grid grid-cols-3 divide-x gap-8">
                <div class="col-span-3 md:col-span-2">
                    <div class="flex gap-2 items-center">
                        <svg class="size-9 ps-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-up-dash">
                            <path d="M9 19h6" />
                            <path d="M9 15v-3H5l7-7 7 7h-4v3H9z" />
                        </svg>
                        <h1 class="text-2xl font-semibold text-gray-600">
                            Ações rápidas</h1>
                    </div>

                    <div class="flex gap-3 my-4 md:overflow-hidden overflow-x-auto scrollbar-none">
                        <div class="flex-shrink-0 w-[174px]">
                            <button @click="$dispatch('show-created-group')"
                                class="w-full h-20 border border-gray-200 rounded-lg px-3 hover:bg-neutral-300 bg-neutral-700 text-neutral-400 flex items-center">
                                <svg class="size-9" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                                <span>
                                    <p>Novo Grupo</p>
                                    <p class="text-xs text-start">Link rápido</p>
                                </span>
                            </button>
                        </div>
                        <div class="flex-shrink-0 w-[174px]">
                            <button @click="$dispatch('show-created-flag')"
                                class="w-full h-20 border border-gray-200 rounded-lg px-3 hover:bg-neutral-300 bg-neutral-700 text-neutral-400 flex items-center">
                                <svg class="size-9" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                                <span>
                                    <p>Nova Bandeira</p>
                                    <p class="text-xs text-start">Link rápido</p>
                                </span>
                            </button>
                        </div>
                        <div class="flex-shrink-0 w-[198px]">
                            <button @click="$dispatch('show-created-collaborator')"
                                class="w-full h-20 border border-gray-200 rounded-lg px-3 flex items-center hover:bg-white">
                                <svg class="size-9" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                                <span>
                                    <p>Colaborador</p>
                                    <p class="text-xs text-start">Link rápido</p>
                                </span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex justify-end mb-4">
                        <div>
                            {{-- <a href="#" class="flex items-center gap-2 bg-transparent hover:bg-slate-200 px-3 py-2 rounded-lg">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                <p class="text-xs text-neutral-700">
                                    Exportar
                                </p>
                            </a> --}}
                            <livewire:pages.components.export 
                                modelClass="App\Models\Group"
                                :aliases="[
                                    'id' => '#',
                                    'name' => 'Nome do grupo',
                                    'created_at' => 'Data de criação',
                                    'updated_at' => 'Última atualização'
                                ]" 
                                :title="'Exportação de Grupos Econômicos'"
                            />
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="grid grid-cols-4 gap-4">
                            @forelse ($groups as $group)
                                <livewire:pages.group.components.card-group :groupId="$group->id" wire:key="{{ $group->id }}" />
                            @empty
                                <div class="col-span-4 text-center">
                                    <img src="{{ asset('assets/images/empty.svg')}}" class="w-60 h-60 mx-auto" alt="Empty icon">
                                    <em class="text-neutral-500 text-center">Nenhum grupo criado foi criado...</em>
                                </div>
                            @endforelse
                            <div class="col-span-4 ">
                                <div class="flex justify-between">
                                    <div>
                                        <select id="perPage" wire:model.live="perPage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full max-w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    <div wire:loading.remove>
                                        {{ $groups->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-1 relative ps-6">
                    <livewire:pages.home.components.timeline :limit="10" />
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL's CREATED GROUP START -->
    <livewire:pages.group.components.modal-group-create />
    <livewire:pages.group.components.modal-group-delete />
    <livewire:pages.group.components.modal-group-edit  />
    <livewire:pages.group.components.modal-group-view />
    <!-- MODAL's CREATED GROUP END -->

    <!-- MODAL CREATED FLAG START -->
    <livewire:pages.flag.components.modal-flag-create /><!-- MODAL CREATED FLAG END -->

    <!-- MODAL CREATED COLLABORATOR START -->
    <livewire:pages.collaborator.components.modal-collaborator-create /><!-- MODAL CREATED COLLABORATOR END -->
</div>
