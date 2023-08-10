<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'gadgets_id',
        'date',
        'interval',
        'is_enabled'
    ];
}
