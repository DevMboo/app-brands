<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flag extends Model
{
    //
    protected $table = "flags";

    protected $fillable = ['name', 'group_economy_id'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_economy_id');
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unity::class, 'flag_id');
    }
}
