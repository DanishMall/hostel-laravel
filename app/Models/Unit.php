<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['block_id', 'name'];

    public function block()
    {
        return $this->belongsTo(Block::class);
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
