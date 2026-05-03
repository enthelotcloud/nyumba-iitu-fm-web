<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['session_id','name', 'phone', 'message'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:H:i',
        ];
    }
}
