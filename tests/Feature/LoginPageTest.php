<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use App\Livewire\Pages\Login\LoginPage;
use App\Livewire\Pages\Components\Register;
use App\Livewire\Pages\Components\Forget;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => Hash::make('password123'),
    ]);

    $this->actingAs($this->user);
});

it('renders the login page when accessed component', function () {
    Livewire::test(LoginPage::class)
        ->assertSee('Login')
        ->assertSee('E-mail')
        ->assertSee('Senha')
        ->assertSee('Entrar na minha conta');
});

it('authenticates the user with valid credentials', function () {
    Livewire::test(LoginPage::class)
        ->set('email', 'user@example.com')
        ->set('password', 'password123')
        ->call('auth')
        ->assertRedirect(route('home'));

    expect(Auth::check())->toBeTrue();
});

it('displays error message on invalid credentials', function () {
    Livewire::test(LoginPage::class)
        ->set('email', 'user@example.com')
        ->set('password', 'wrongpassword')
        ->call('auth')
        ->assertHasErrors('invalid')
        ->assertSee('E-mail ou senha inválidas. Por favor, tente novamente.');
});

it('renders the register component on the login page', function () {
    $response = $this->get('/login');

    $response->assertSeeLivewire('pages.components.register');
});

it('renders the forget component on the login page', function () {
    $response = $this->get('/login');

    $response->assertSeeLivewire('pages.components.forget');
});
