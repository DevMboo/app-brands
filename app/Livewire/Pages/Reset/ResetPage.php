<?php

namespace App\Livewire\Pages\Reset;

use Livewire\Component;
use Livewire\Attributes\Url;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Request;

use Carbon\Carbon;

class ResetPage extends Component
{
    #[Url] 
    public string $token = "";

    public ?Request $obRequest = null;

    public string $password = "";

    public bool $render = true;

    public function mount()
    {
       $this->obRequest = Request::whereNull('processed_at')->where('reset_token', $this->token)->first();
    }

    public function resetPassword()
    {   
        $this->validate(
            ['password' => 'required|min:8|max:70'], 
            [
                'password.required' => '* O campo senha é obrigatório.',
                'password.min' => '* O campo senha deve conter no mínimo :min caracteres.',
                'password.max' => '* O campo senha deve conter no máximo :max caracteres.'
            ]
        );
        
        User::where('email', $this->obRequest->email)->update([
            'password' => Hash::make($this->password),
        ]);

        Request::where('reset_token', $this->token)->update([
            'processed_at' => Carbon::now(),
        ]);

        $this->render = false;
    }

    public function render()
    {
        return view('livewire.pages.reset.reset-page')->title('Login');
    }
}
