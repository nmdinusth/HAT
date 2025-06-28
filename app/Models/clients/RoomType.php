<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rooms () {
        return $this->hasMany(Room::class);
    }
    public function hotel () {
        return $this->belongsTo(Hotel::class);
    }
}
