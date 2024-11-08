<?php

namespace App\Console\Commands;

use App\Jobs\SendResetPasswordEmail;
use App\Models\Request;
use Illuminate\Console\Command;

class ProcessPendingRequests extends Command
{
    protected $signature = 'queue:process-pending-requests';
    protected $description = 'Processa as solicitações pendentes e envia os e-mails de reset de senha';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $pendingRequests = Request::where('status', 'pending')->get();

        foreach ($pendingRequests as $request) {
            SendResetPasswordEmail::dispatch($request->id);
        }

        $this->info('Todos os e-mails de reset de senha foram enviados!');
    }
}
