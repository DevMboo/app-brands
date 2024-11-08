<div class="relative bg-gray-50">
    <div class="grid place-items-center items-center h-screen">
        <div class="w-full max-w-96 h-auto min-h-60 rounded-2xl shadow-sm border border-gray-200 border-t-4 border-t-neutral-800 bg-white px-4 py-3">
            @if ($obRequest)
            @if (!$render)
            <form wire:submit="resetPassword">
                <div class="grid space-y-4 my-3">
                    <div class="border-b border-gray-200">
                        <h1 class="text-2xl font-semibold pb-3">Recuperar senha</h1>
                    </div>
        
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="password">
                        @error('password')
                        <p class="text-neutral-700 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                   
                    <div>
                        <button type="submit" class="w-full flex items-center justify-center text-white bg-neutral-600 hover:bg-neutral-700 focus:ring-4 focus:outline-none focus:ring-neutral-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-neutral-600 dark:hover:bg-neutral-700 dark:focus:ring-neutral-800">
                            <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-white rounded-full" wire:loading role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span wire:loading.remove>
                                Redefinir senha
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            @else
            <div class="my-7">
                <h1 class="text-center text-2xl">Sucesso!</h1>
                <p class="mb-2 text-neutral-500 text-center">Sua senha foi atualizada com sucesso, deseja efetuar seu login?</p>
                <a href="{{ route('login') }}" wire:navigate class="py-2 px-3 bg-neutral-600 hover:bg-neutral-700 text-white inline-block w-full text-center rounded-lg">Ir para a tela de login</a>
            </div>
            @endif
            @else
            <div class="w-full text-center">
                <img src="{{ asset('assets/images/empty.svg')}}" class="w-60 h-60 mx-auto" alt="Empty icon">
                <em class="text-neutral-500 text-center">Nenhuma solicitação identificada com este token...</em>
            </div>
            @endif
        </div>
    </div>
</div>
