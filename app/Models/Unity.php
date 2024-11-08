<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unity extends Model
{
    //
    protected $table = "unity";

    protected $fillable = ['name_fantasy', 'company_name', 'cnpj', 'flag_id'];

    public function flag(): BelongsTo
    {
        return $this->belongsTo(Flag::class, 'flag_id');
    }

    public function collaborator(): HasMany
    {
        return $this->hasMany(Collaborator::class, 'unity_id');
    }
}
