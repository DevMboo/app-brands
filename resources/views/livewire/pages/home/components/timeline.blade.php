
<div>
    <div class="flex justify-between pb-5">
        <h3 class="mb-4 text-gray-600 font-semibold">Histórico de atividades</h3>
        <div>
            <div class="relative" x-data="{ expanded: false }">
                <button 
                    @click="expanded = !expanded" 
                    class="bg-transparent hover:bg-slate-200 rounded-xl w-8 h-8 text-center flex justify-center items-center">
                    <svg class="size-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis">
                        <circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/>
                    </svg>
                </button>
            
                <!-- Dropdown menu -->
                <div 
                    x-show="expanded" 
                    @click.outside="expanded = false" 
                    class="absolute top-full right-2 z-40 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg p-2">
                    <ul class="text-gray-700" x-data="{ selectedUserId: null }">
                        <li>
                            <div class="relative w-full mb-2">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                            <input type="text" id="search" wire:model.live="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pesquisar..." required />
                            </div>
                        </li>
                        <li><a href="#" wire:click="$set('byId', {{ auth()->user()->id }})" class="text-sm block px-4 py-3 hover:bg-gray-100 rounded">Minhas alterações</a></li>
                        <li><a href="#" wire:click="$set('run', 'CREATED')" class="text-sm block px-4 py-3 hover:bg-gray-100 rounded">Registros</a></li>
                        <li><a href="#" wire:click="$set('run', 'EDIT')" class="text-sm block px-4 py-3 hover:bg-gray-100 rounded">Edições</a></li>
                        <li><a href="#" wire:click="$set('run', 'DELETE')" class="text-sm block px-4 py-3 hover:bg-gray-100 rounded">Deletados</a></li>
                        @foreach ($users as $user)
                            <li wire:key="{{$user->id}}">
                                <a href="#" 
                                class="text-sm block px-4 py-2 hover:bg-gray-100 rounded"
                                wire:click="$set('byId', '{{$user->id}}')"
                                :class="selectedUserId === {{$user->id}} ? 'bg-gray-200 dark:bg-gray-700' : ''"
                                @click="selectedUserId = {{$user->id}}">
                                    <div class="relative inline-flex items-center justify-center w-6 h-6 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                        <span class="font-medium text-sm text-gray-600 dark:text-gray-300">{{ $this->getInitials($user->name) }}</span>
                                    </div>
                                    {{$user->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <ol class="relative border-s border-gray-200 dark:border-gray-700">
        @forelse ($timelines as $timeline)
            @switch($timeline->run)
                @case('CREATED')
                    <li class="mb-10 ms-6" wire:key="{{ $timeline->id }}">            
                        <span class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">{{ $this->getInitials($timeline->user->name) }}</span>
                            </div>
                        </span>
                        <div class="flex-col items-start justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600"
                            x-data="{ openAfter: false }" x-init="openAfter = false">
                            
                            <div class="text-sm font-normal text-gray-500 dark:text-gray-300">
                                {{ $timeline->getDialogMessage() }}, alterações feitas por 
                                <a href="#" class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">{{ $timeline->user->name }}</a>, 
                                veja as alterações 
                                <button class="bg-gray-100 text-gray-800 text-xs font-normal me-2 px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300 cursor-pointer" 
                                        type="button" 
                                        @click="openAfter = !openAfter">
                                    Clique aqui
                                </button>
                            </div>
                            
                            <div x-show="openAfter" x-collapse 
                                class="p-3 text-xs italic font-normal w-full mt-2 text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300 mb-4">
                                <div class="w-full">
                                    @if($timeline->after)
                                        @foreach (json_decode($timeline->after, true) as $key => $value)
                                            <div class="flex items-start">
                                                <div class="font-medium text-gray-600 dark:text-gray-300">{{ ucfirst($key) }}:</div>
                                                <div class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                                    {{ is_array($value) ? json_encode($value, JSON_PRETTY_PRINT) : $value }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-sm text-gray-600 dark:text-gray-300">No updated data</div>
                                    @endif
                                </div>
                            </div>
                    
                            <time class="mb-1 text-xs font-normal text-gray-400 text-end sm:mb-0">
                                {{ \Carbon\Carbon::parse($timeline->created_at)->format('d/m/Y H:i') }}
                            </time>
                        </div>
                    </li>
                    @break
                @case('EDIT')
                    <li class="mb-10 ms-6" wire:key="$timeline->id">
                        <span class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">{{ $this->getInitials($timeline->user->name) }}</span>
                            </div>
                        </span>
                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                            <div class="items-center justify-between mb-3 sm:flex">
                            
                                <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">{{ $timeline->getDialogMessage() }}, por  <a href="#" class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">{{ $timeline->user->name }}</a></div>
                            </div>
                    
                            <div x-data="{ openBefore: false }">
                                <div class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300 mb-4">
                                    <div class="mb-2 font-semibold text-gray-700 dark:text-gray-200 w-full">
                                        <button @click="openBefore = !openBefore" class="flex items-center w-full justify-between">
                                            <span class="mr-2">Antes</span>
                                            <svg :class="{'rotate-180': openBefore}" class="w-4 h-4 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-show="openBefore" x-collapse>
                                        @if($timeline->before)
                                            @foreach (json_decode($timeline->before, true) as $key => $value)
                                                <div class="flex items-center">
                                                    <div class="font-medium text-gray-600 dark:text-gray-300">{{ ucfirst($key) }}:</div>
                                                    <div class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ is_array($value) ? json_encode($value, JSON_PRETTY_PRINT) : $value }}</div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="text-sm text-gray-600 dark:text-gray-300">Registro recém criado</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    
                            <div x-data="{ openAfter: false }">
                                <div class="p-3 mb-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                    <div class="mb-2 font-semibold text-gray-700 dark:text-gray-200 w-full">
                                        <button @click="openAfter = !openAfter" class="flex items-center w-full justify-between">
                                            <span class="mr-2">Depois</span>
                                            <svg :class="{'rotate-180': openAfter}" class="w-4 h-4 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-show="openAfter" x-collapse>
                                        @if($timeline->after)
                                            @foreach (json_decode($timeline->after, true) as $key => $value)
                                                <div class="flex items-center">
                                                    <div class="font-medium text-gray-600 dark:text-gray-300">{{ ucfirst($key) }}:</div>
                                                    <div class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ is_array($value) ? json_encode($value, JSON_PRETTY_PRINT) : $value }}</div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="text-sm text-gray-600 dark:text-gray-300">No updated data</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <time class="mb-1 text-xs font-normal text-gray-400 sm:mb-0">{{ \Carbon\Carbon::parse($timeline->created_at)->format('d/m/Y H:i') }} </time>
                        </div>
                    </li>
                    @break
                @case('DELETED')
                    <li class="ms-6 mb-10" x-data="{ openBefore: false }">
                        <span class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">{{ $this->getInitials($timeline->user->name) }}</span>
                            </div>
                        </span>
                        <div class="items-start flex-col justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                            
                            <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
                                {{ $timeline->getDialogMessage() }}, alteração feita por 
                                <a href="#" class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">{{ $timeline->user->name }}</a>
                                <button class="bg-gray-100 text-gray-800 text-xs font-normal px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300 cursor-pointer" type="button" @click="openBefore = !openBefore">
                                    Visualizar item deletado
                                </button>
                            </div>
                    
                            <div x-show="openBefore" x-collapse class="p-3 text-xs italic font-normal w-full mt-2 text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300 mb-4">
                                @if($timeline->before)
                                    @foreach (json_decode($timeline->before, true) as $key => $value)
                                        <div class="flex items-start">
                                            <div class="font-medium text-gray-600 dark:text-gray-300">{{ ucfirst($key) }}:</div>
                                            <div class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                                {{ is_array($value) ? json_encode($value, JSON_PRETTY_PRINT) : $value }}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-sm text-gray-600 dark:text-gray-300">No updated data</div>
                                @endif
                            </div>
                    
                            <time class="mb-1 text-xs font-normal text-gray-400 sm:mb-0">{{ \Carbon\Carbon::parse($timeline->created_at)->format('d/m/Y H:i') }}</time>
                        </div>
                    </li>
                    @break
                @default
                    
            @endswitch
        @empty
        <em class="text-neutral-500 text-center">Nenhum registro foi catalogado...</em>
        @endforelse                  
    
    </ol>
</div>

