<?php

namespace App\Jobs;

use App\Mail\ResetPasswordMail;
use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendResetPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public ?int $requestId;

    public function __construct($requestId)
    {
        $this->requestId = $requestId;
    }

    public function handle()
    {
        try {
   
            $request = Request::find($this->requestId);
    
            if ($request) {
                $user = $request->user;
                $token = $request->reset_token;
    
                Mail::to($user->email)->send(new ResetPasswordMail($user, $token));
    
                $request->update(['status' => 'sent']);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
