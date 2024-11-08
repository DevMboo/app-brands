<?php

use App\Models\User;

it('renders the group page after successful login', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);

    $response = $this->get('/group');

    $response->assertSeeLivewire('pages.group.group-page');
});

it('renders the modal created component on the group page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/group');

    $response->assertSeeLivewire('pages.group.components.modal-group-create');
});

it('renders the modal deleted component on the group page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/group');

    $response->assertSeeLivewire('pages.group.components.modal-group-delete');
});

it('renders the modal view component on the group page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/group');

    $response->assertSeeLivewire('pages.group.components.modal-group-view');
});

it('renders the modal edit component on the group page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/group');

    $response->assertSeeLivewire('pages.group.components.modal-group-edit');
});

it('renders the export component on the group page', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user);


    $response = $this->get('/group');

    $response->assertSeeLivewire('pages.group.components.modal-group-edit');
});
