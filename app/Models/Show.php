<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Show extends Model
{
    protected $fillable = ['name', 'slug', 'excerpt', 'cover_image', 'show_host'];

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class)->orderBy('start_time');
    }
}
