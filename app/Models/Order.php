<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'total_price',
        'billing_first_name',
        'billing_house_number',
        'billing_subdistrict',
        'billing_district',
        'billing_province',
        'billing_postcode',
        'billing_phone',
        'billing_email',
        'status',
        'payment_type',
        'payment_slip'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
