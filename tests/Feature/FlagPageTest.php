<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders the flag page after successful login', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);

    $response = $this->get('/flag');

    $response->assertSeeLivewire('pages.flag.flag-page');
});

it('renders the modal created component on the flag page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/flag');

    $response->assertSeeLivewire('pages.flag.components.modal-flag-create');
});

it('renders the modal deleted component on the flag page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/flag');

    $response->assertSeeLivewire('pages.flag.components.modal-flag-delete');
});

it('renders the modal view component on the flag page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/flag');

    $response->assertSeeLivewire('pages.flag.components.modal-flag-view');
});

it('renders the modal edit component on the flag page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/flag');

    $response->assertSeeLivewire('pages.flag.components.modal-flag-edit');
});

it('renders the export component on the flag page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/flag');

    $response->assertSeeLivewire('pages.flag.components.modal-flag-edit');
});