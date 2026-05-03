<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    protected $fillable = ['show_id', 'day_of_week', 'start_time', 'end_time'];

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class);
    }

    public function getDayNameAttribute(): string
    {
        return [
            0 => 'Sunday', 1 => 'Monday', 2 => 'Tuesday',
            3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday'
        ][$this->day_of_week];
    }
}
