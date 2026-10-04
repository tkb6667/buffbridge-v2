<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentScheduleOverride extends Model
{
    public const STATUSES = ['open', 'closed'];

    protected $fillable = ['override_date', 'status'];

    protected function casts(): array
    {
        return [
            'override_date' => 'date',
        ];
    }
}
