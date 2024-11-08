<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    //
    protected $table = "group_economy";

    protected $fillable = ['name'];

    public function flags(): HasMany
    {
        return $this->hasMany(Flag::class, 'group_economy_id');
    }
}
