<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
    ];

    /**
     * Get order
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
