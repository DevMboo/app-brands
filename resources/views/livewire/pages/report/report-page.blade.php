<div class="min-h-screen w-full bg-slate-100 rounded-s-2xl">
    <div class="px-3 py-3 relative">
        <div class="grid grid-cols-9 gap-3 mt-6">
            <div class="col-span-9 md:col-span-3">
                <div class="max-w-xl w-full min-h-96 bg-white rounded-2xl shadow dark:bg-gray-800 p-4 md:p-6">
                    <livewire:pages.report.components.column-chart-groups />
                </div>
            </div>
            <div class="col-span-9 md:col-span-3">
                <div class="max-w-xl w-full min-h-96 bg-white rounded-2xl shadow dark:bg-gray-800 p-4 md:p-6">
                    <livewire:pages.report.components.column-chart-flags />
                </div>
            </div>
            <div class="col-span-9 md:col-span-3">
                <div class="max-w-xl w-full min-h-96 bg-white rounded-2xl shadow dark:bg-gray-800 p-4 md:p-6">
                    <livewire:pages.report.components.pie-chart-entitys />
                </div>
            </div>
            <div class="col-span-9">
                <div class="w-full bg-white rounded-2xl shadow dark:bg-gray-800 p-4 md:p-6">
                    <livewire:pages.report.components.column-chart-changes />
                </div>
            </div>

            <div class="col-span-9 mt-12 border-t">
                <div class="px-4 relative pt-10">
                    <livewire:pages.home.components.timeline :limit="100" />
                </div>
            </div>
        </div>
    </div>
</div>

