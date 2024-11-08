<div class="relative bg-gray-50">
    <div class="grid place-items-center items-center h-screen">
        <div class="w-full max-w-96 h-auto min-h-60 rounded-2xl shadow-sm border border-gray-200 border-t-4 border-t-slate-800 bg-white px-4 py-3">
            <form wire:submit="auth">
                <div class="grid space-y-4 my-3">
                    <div class="border-b border-gray-200">
                        <h1 class="text-2xl font-semibold pb-3">Login</h1>
                    </div>
                    @error('invalid')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg mt-2 bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Aviso!</span> {{ $message }}
                        </div>
                    @enderror
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" wire:model="email">
                        @error('email')
                        <p class="text-red-700 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="password">
                        @error('password')
                        <p class="text-red-700 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="w-full flex items-center justify-center text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                            <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-white rounded-full" wire:loading role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span wire:loading.remove>
                                Entrar na minha conta
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
