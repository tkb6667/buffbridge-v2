<?php

return [
    'booking_weekdays' => [2, 3, 4, 5, 6], // Tuesday through Saturday (ISO-8601)

    'booking_times' => [
        '12:00',
        '13:00',
        '14:00',
        '15:00',
        '16:00',
        '17:00',
    ],

    // Customers can book from today up to 3 months in advance.
    'booking_window_months' => 3,

    'slot_interval_minutes' => 60,
];