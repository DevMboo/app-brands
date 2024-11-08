<div class="h-80"  wire:ignore.self>
    <div class="flex justify-between">
        <h1 class="text-neutral-800 text-lg font-semibold">Criação de grupos econômicos</h1>
        <div class="flex justify-end">
            <div class="relative " x-data="{ expanded: false }">
                <a href="#" @click="expanded = !expanded" class="text-sm w-full flex gap-1 px-4 py-2 bg-transparent hover:bg-slate-200 rounded-lg">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                    Últimos {{ $days }} dias
                </a>

                <!-- Dropdown menu -->
                <div x-show="expanded" @click.outside="expanded = false"
                    class="absolute top-full left-0 z-40 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg p-2">
                    <ul class="text-gray-700 gap-3">
                        <li><a href="#" wire:click="$set('days', 7)" class="text-sm block px-4 py-3 hover:bg-gray-100 rounded {{ $days == 7 ? "bg-gray-200" : "bg-transparent"}}">Últimos 7 dias</a></li>
                        <li><a href="#" wire:click="$set('days', 15)" class="text-sm block px-4 py-3 hover:bg-gray-100 rounded {{ $days == 15 ? "bg-gray-200" : "bg-transparent"}}">Últimos 15 dias</a></li>
                        <li><a href="#" wire:click="$set('days', 30)" class="text-sm block px-4 py-3 hover:bg-gray-100 rounded {{ $days == 30 ? "bg-gray-200" : "bg-transparent"}}">Últimos 30 dias</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <livewire:livewire-column-chart :column-chart-model="$columnChartModel"  key="{{ $columnChartModel->reactiveKey() }}" />
</div>
