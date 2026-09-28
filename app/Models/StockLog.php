<?php

// app/Models/StockLog.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    protected $fillable = ['product_id', 'old_quantity', 'new_quantity', 'type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
