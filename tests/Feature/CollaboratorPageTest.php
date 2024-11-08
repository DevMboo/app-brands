<?php

use App\Models\User;

it('renders the collaborator page after successful login', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);

    $response = $this->get('/collaborator');

    $response->assertSeeLivewire('pages.collaborator.collaborator-page');
});

it('renders the modal created component on the collaborator page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/collaborator');

    $response->assertSeeLivewire('pages.collaborator.components.modal-collaborator-create');
});

it('renders the modal deleted component on the collaborator page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/collaborator');

    $response->assertSeeLivewire('pages.collaborator.components.modal-collaborator-delete');
});

it('renders the modal view component on the collaborator page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/collaborator');

    $response->assertSeeLivewire('pages.collaborator.components.modal-collaborator-view');
});

it('renders the modal edit component on the collaborator page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/collaborator');

    $response->assertSeeLivewire('pages.collaborator.components.modal-collaborator-edit');
});

it('renders the export component on the collaborator page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/collaborator');

    $response->assertSeeLivewire('pages.collaborator.components.modal-collaborator-edit');
});