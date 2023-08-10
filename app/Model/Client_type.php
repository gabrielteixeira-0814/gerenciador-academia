<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client_type extends Model
{
    protected $fillable = [
        'type',
        'is_enabled',
    ];
}
