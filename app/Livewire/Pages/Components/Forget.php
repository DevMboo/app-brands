<?php

namespace App\Livewire\Pages\Components;


use Livewire\Component;
use Livewire\Attributes\On; 

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Request;
class Forget extends Component
{

    public string $email = "";

    public bool $render = false;

    #[On('show-modal-forget')] 
    public function show()
    {
        $this->render = !$this->render; 
    }

    #[On('dismiss-modal-forget')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function generatedToken()
    {
        return Str::random(7);
    }

    public function save()
    {
        $user = User::where('email', $this->email)->first();

        if($user) {
            Request::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'reset_token' => $this->generatedToken(),
                'status' => 'pending',
            ]);

            $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Solicitação encaminhada, logo um e-mail com o token para resetar sua senha chegara no seu email!']);

            $this->reset();
        } else {
            $this->dispatch('show-toast', data: ['type' => 3, 'message' => 'Nenhum usuário localizado com o email informado, verifique os campos e tente novamente.']);
        }

        $this->dismiss();
    }

    public function render()
    {
        return view('livewire.pages.components.forget');
    }
}
