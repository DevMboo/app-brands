<?php

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders the home page after successful login', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);

    $response = $this->get('/');

    $response->assertSeeLivewire('pages.home.home-page');
});

it('renders the correct total counts in home page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);

    $response = $this->get('/');

    $response->assertSee('Grupos Ativos');
    $response->assertSee('Bandeiras Ativas');
    $response->assertSee('Unidades Ativas');
    $response->assertSee('Colaboradores');
});

it('renders the time component on the home page', function () {

    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/');

    $response->assertSeeLivewire('pages.home.components.timeline');
});

it('renders the modal created component on the home page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/');

    $response->assertSeeLivewire('pages.group.components.modal-group-create');
});

it('renders the modal deleted component on the home page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/');

    $response->assertSeeLivewire('pages.group.components.modal-group-delete');
});

it('renders the modal view component on the home page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/');

    $response->assertSeeLivewire('pages.group.components.modal-group-view');
});

it('renders the modal edit component on the home page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/');

    $response->assertSeeLivewire('pages.group.components.modal-group-edit');
});

it('renders the modal created flag component on the home page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/');

    $response->assertSeeLivewire('pages.flag.components.modal-flag-create');
});

it('renders the modal created collaborator component on the home page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/');

    $response->assertSeeLivewire('pages.collaborator.components.modal-collaborator-create');
});