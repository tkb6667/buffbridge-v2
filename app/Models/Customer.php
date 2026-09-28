<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'google_id',
        'phone', 'house_number', 'village', 'subdistrict',
        'district', 'province', 'postal_code', 'membership_status'
    ];
    
    protected $hidden = ['password'];
}
