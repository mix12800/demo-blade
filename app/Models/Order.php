<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;


#[Fillable(['name', 'date', 'room_id', 'pay', 'user_id'])]
class Order extends Model
{
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'order_id');
    }
}
