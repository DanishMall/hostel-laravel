<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'block_id', 'unit_id', 'floor_id',
        'price', 'status'
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}
