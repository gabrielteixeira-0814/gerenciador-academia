<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\user;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'office',
        'is_enabled'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
