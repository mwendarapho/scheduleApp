<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roster extends Model
{
    use HasFactory;

    public function shifts(): HasMany
    {
        return $this->hasMany(Shifts::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
