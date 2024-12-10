<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['name'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
