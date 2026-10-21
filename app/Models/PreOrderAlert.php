<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreOrderAlert extends Model
{
    private const COUNTRY_FLAGS = [
        'china' => '🇨🇳',
        'hong kong' => '🇭🇰',
        'japan' => '🇯🇵',
        'south korea' => '🇰🇷',
        'korea' => '🇰🇷',
        'taiwan' => '🇹🇼',
        'thailand' => '🇹🇭',
        'united kingdom' => '🇬🇧',
        'uk' => '🇬🇧',
        'united states' => '🇺🇸',
        'usa' => '🇺🇸',
    ];

    public const STATUSES = [
        'on_time' => 'On Time',
        'delayed' => 'Delayed',
        'arrived' => 'Arrived',
        'cancelled' => 'Cancelled',
    ];

    protected $fillable = [
        'origin_country',
        'product_name',
        'pax',
        'eta',
        'status',
        'remarks',
        'display_order',
    ];

    protected function casts(): array
    {
        return ['eta' => 'date'];
    }

    public function countryFlag(): string
    {
        return self::COUNTRY_FLAGS[mb_strtolower(trim($this->origin_country), 'UTF-8')] ?? '🏳️';
    }
}
