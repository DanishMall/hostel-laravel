<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = ['block_id', 'unit_id', 'number'];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
