<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\Collaborator\CollaboratorPage;
use App\Livewire\Pages\Flag\FlagPage;
use App\Livewire\Pages\Group\GroupPage;
use App\Livewire\Pages\Home\HomePage;
use App\Livewire\Pages\Login\LoginPage;
use App\Livewire\Pages\Unity\UnityPage;
use App\Livewire\Pages\Report\ReportPage;

Route::get('/login', LoginPage::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/flag', FlagPage::class)->name('flag');
    Route::get('/report', ReportPage::class)->name('report');
    Route::get('/group', GroupPage::class)->name('group');
    Route::get('/unity', UnityPage::class)->name('unity');
    Route::get('/collaborator', CollaboratorPage::class)->name('collaborator');
});