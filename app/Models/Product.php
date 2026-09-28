<?php
// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'name',
        'brand',
        'availability',
        'description',
        'price',
        'stock_quantity',
        'category_id',
        'category_id2'
    ];

    public static function availabilityOptions()
    {
        return [
            'in_stock' => 'In Stock',
            'out_of_stock' => 'Out of Stock',
            'pre_order' => 'Pre-Order',
        ];
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }
    // app/Models/Product.php

    protected static function booted()
    {
        static::updating(function ($product) {
            // เช็คว่า stock_quantity มีการเปลี่ยนแปลงหรือไม่
            if ($product->isDirty('stock_quantity')) {
                // ดึงค่า stock_quantity เดิมและใหม่
                $old_stock = (float) $product->getOriginal('stock_quantity');
                $new_stock = (float) $product->stock_quantity;

                // โค้ดส่วน StockLog เดิมของคุณ
                \App\Models\StockLog::updateOrCreate(
                    ['product_id' => $product->id],
                    [
                        'old_quantity' => $old_stock,
                        'new_quantity' => $new_stock,
                        'type' => $new_stock > $old_stock ? 'restock' : 'adjustment',
                    ]
                );
            }
        });

        static::updated(function ($product) {
            // เช็คว่า stock_quantity มีการเปลี่ยนแปลงหรือไม่
            if ($product->wasChanged('stock_quantity')) {
                // เงื่อนไข: ถ้า availability เดิมไม่ใช่ 'Pre-Order'
                if ($product->getOriginal('availability') !== 'Pre-Order') {
                    if ($product->stock_quantity > 0) {
                        // ถ้าสต็อกมากกว่า 0 และสถานะปัจจุบันไม่ใช่ 'In Stock'
                        if ($product->availability !== 'In Stock') {
                            $product->availability = 'In Stock';
                            $product->save(); // **ต้องเรียก save() อีกครั้งเพื่อบันทึกสถานะใหม่**
                        }
                    } elseif ($product->stock_quantity === 0) {
                        // ถ้าสต็อกเท่ากับ 0 และสถานะปัจจุบันไม่ใช่ 'Out of Stock'
                        if ($product->availability !== 'Out of Stock') {
                            $product->availability = 'Out of Stock';
                            $product->save(); // **ต้องเรียก save() อีกครั้งเพื่อบันทึกสถานะใหม่**
                        }
                    }
                }
            }
        });
    }

    public function stockLogs()
    {
        return $this->hasMany(\App\Models\StockLog::class);
    }

    // app/Models/Product.php

    public function category2()
    {
        return $this->belongsTo(Category::class, 'category_id2');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute()
    {
        return round($this->reviews()->avg('rating'), 1); // เช่น 4.2
    }
}
