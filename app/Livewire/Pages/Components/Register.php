<?php

namespace App\Livewire\Pages\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Register extends Component
{

    public string $name = "";

    public string $email = "";

    public string $password = "";

    public bool $render = false;

    #[On('show-modal-register')] 
    public function show()
    {
        $this->render = !$this->render; 
    }

    #[On('dismiss-modal-register')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'O nome completo é obrigatório.',
            'name.string' => 'O nome deve ser uma string válida.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado. Tente outro.',

            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
        ]);

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Cadastro realizado com sucesso! Seja bem-vindo!']);

            $this->reset();

            $this->dismiss();

        } catch (\Exception $e) {
            $this->dispatch('show-toast', data: ['type' => 3, 'message' => 'Houve um erro ao tentar criar sua conta. Tente novamente mais tarde.']);
        }
    }

    public function render()
    {
        return view('livewire.pages.components.register');
    }
}
