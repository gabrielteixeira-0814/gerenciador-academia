<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Maintenance;

class Gadgets extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'is_enabled'
    ];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class, 'gadgets_id');
    }
}
