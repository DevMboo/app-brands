<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

use App\Console\Commands\ProcessPendingRequests;

Schedule::command(ProcessPendingRequests::class)->everyTwentySeconds();