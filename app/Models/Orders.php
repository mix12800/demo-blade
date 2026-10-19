<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;



#[Fillable(['name', 'date', 'room_id', 'pay', 'user_id'])]
class Orders extends Model
{
    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'order_id');
    }
}
