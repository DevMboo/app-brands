<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    protected $table = "request_email";

    protected $fillable = ['user_id', 'email', 'status', 'attempts', 'error_message', 'reset_token', 'processed_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
