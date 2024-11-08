<?php

namespace App\Livewire\Pages\Login;

use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginPage extends Component
{

    public string $email = "";

    public string $password = "";

    public function auth()
    {
        $this->validate(
            [
                'email' => 'required|email|min:8|max:255',
                'password' => 'required|min:8|max:70',
            ]
            ,[
                'email.email' => '* O campo e-mail não está válido, é necessario conter "@" ou ".com" verifique.',
                'email.required' => '* O campo e-mail é obrigatório.',
                'email.min' => '* O campo e-mail deve conter no mínimo :min caracteres.',
                'email.max' => '* O campo e-mail deve conter no máximo :min caracteres.',

                'password.required' => '* O campo senha é obrigatório.',
                'password.min' => '* O campo senha deve conter no mínimo :min caracteres.',
                'password.max' => '* O campo senha deve conter no máximo :max caracteres.'
            ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return  $this->redirectRoute('home');
        } else {
            $this->addError('invalid', 'E-mail ou senha inválidas. Por favor, tente novamente.');
        }

    }

    public function render()
    {
        return view('livewire.pages.login.login-page')->title('Login');
    }
}
