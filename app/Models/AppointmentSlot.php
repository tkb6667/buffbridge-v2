<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AppointmentSlot extends Model
{
    protected $fillable = ['appointment_date', 'appointment_time', 'active'];

    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
            'active' => 'boolean',
        ];
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function reservation(): HasOne
    {
        return $this->hasOne(Appointment::class, 'reserved_slot_id');
    }
}
