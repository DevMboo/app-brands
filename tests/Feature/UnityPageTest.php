<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders the unity page after successful login', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);

    $response = $this->get('/unity');

    $response->assertSeeLivewire('pages.unity.unity-page');
});

it('renders the modal created component on the unity page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/unity');

    $response->assertSeeLivewire('pages.unity.components.modal-unity-create');
});

it('renders the modal deleted component on the unity page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/unity');

    $response->assertSeeLivewire('pages.unity.components.modal-unity-delete');
});

it('renders the modal view component on the unity page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/unity');

    $response->assertSeeLivewire('pages.unity.components.modal-unity-view');
});

it('renders the modal edit component on the unity page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/unity');

    $response->assertSeeLivewire('pages.unity.components.modal-unity-edit');
});

it('renders the export component on the unity page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/unity');

    $response->assertSeeLivewire('pages.unity.components.modal-unity-edit');
});