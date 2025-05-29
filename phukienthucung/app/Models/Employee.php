<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'birth_date',
        'gender',
        'cccd',
        'salary',
        'start_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
