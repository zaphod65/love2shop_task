<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
    ];

    public function scopeForUser($query, $userId)
    {
        return $query->where([
            'user_id' => $userId,
        ]);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
