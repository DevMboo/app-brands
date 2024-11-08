<div class="min-h-screen w-full bg-slate-100 rounded-s-2xl">
    <div class="px-3 py-3 relative">
        <nav class="flex justify-between gap-2 relative mb-3">
            <div>
                <ul class="text-gray-700 flex">
                    <li>
                        <a href="#" @click="$dispatch('show-created-collaborator')" class="text-sm w-full flex gap-1 items-center px-4 py-2 bg-transparent hover:bg-slate-200 rounded-lg">          
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            Adicionar
                        </a>
                    </li>
                    <li>
                        <div class="relative " x-data="{ expanded: false }">
                            <a href="#" @click="expanded = !expanded" class="text-sm w-full flex gap-1 px-4 py-2 bg-transparent hover:bg-slate-200 rounded-lg">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                                Pesquisar por data
                            </a>

                            <!-- Dropdown menu -->
                            <div x-show="expanded" @click.outside="expanded = false"
                                class="absolute top-full left-0 z-40 mt-2 w-96 bg-white border border-gray-200 rounded-xl shadow-lg p-2">
                                <ul class="text-gray-700 flex items-center gap-3">
                                    <li class="flex-shrink-0 flex-1 w-[46%]">
                                        <div class="relative max-w-sm">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input type="text" wire:model.live="date_ini" x-mask="99/99/9999" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date ini">
                                        </div>
                                    </li>
                                    <li class="w-[8%]">
                                        <p class="ms-1">
                                            Até
                                        </p>
                                    </li>
                                    <li class="flex-shrink-0 flex-1 w-[46%]">
                                        <div class="relative max-w-sm">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input type="text" wire:model.live="date_end" x-mask="99/99/9999" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date end">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" @click="$dispatch('show-historic-collaborator')" class="text-sm w-full flex gap-2 px-4 py-2 bg-transparent hover:bg-slate-200 rounded-lg">
                            Histórico geral
                        </a>
                    </li>
                </ul>
            </div>

            <livewire:pages.components.export 
                modelClass="App\Models\Collaborator"
                :aliases="[
                    'id' => '#',
                    'name' => 'Nome do colaborador',
                    'email' => 'Email',
                    'cpf' => 'CPF',
                    'unity_id' => 'Unidade vinculada',
                    'created_at' => 'Data de criação',
                    'updated_at' => 'Última atualização'
                ]" 
                :fk="['unity_id' => 'name_fantasy']"
                :itWith="'unity'"
                :title="'Exportação de colaboradores'"
            />

        </nav>

        <div class="w-full">
            <div class="grid grid-cols-4 gap-4">
                @forelse ($collaborators as $collaborator)
                    <livewire:pages.collaborator.components.card-collaborator :collaboratorId="$collaborator->id" wire:key="{{ $collaborator->id }}" />
                @empty
                    <div class="col-span-4 text-center">
                        <img src="{{ asset('assets/images/empty.svg')}}" class="w-60 h-60 mx-auto" alt="Empty icon">
                        <em class="text-neutral-500 text-center">Nenhum colaborador foi cadastrado...</em>
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
                            {{ $collaborators->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CREATED COLLABORATOR START -->
    <livewire:pages.collaborator.components.modal-collaborator-create />
    <livewire:pages.collaborator.components.modal-collaborator-delete />
    <livewire:pages.collaborator.components.modal-collaborator-edit />
    <livewire:pages.collaborator.components.modal-collaborator-view />
    <!-- MODAL CREATED COLLABORATOR END -->
</div>
