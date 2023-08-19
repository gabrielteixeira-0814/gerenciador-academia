<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\user;

class Employee extends Model
{
    protected $fillable = [
        'office',
        'is_enabled'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'employee_id');
    }
}
