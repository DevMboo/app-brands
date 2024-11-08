<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Collaborator extends Model
{
    //
    protected $table = "collaborators";
    
    protected $fillable = ['name', 'email', 'cpf', 'unity_id'];

    public function unity(): BelongsTo
    {
        return $this->belongsTo(Unity::class, 'unity_id');
    }

}
