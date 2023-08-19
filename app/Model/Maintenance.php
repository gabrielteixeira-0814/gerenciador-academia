<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Gadgets;

class Maintenance extends Model
{
    protected $fillable = [
        'gadgets_id',
        'date',
        'interval',
        'is_enabled'
    ];

    public function gadgets() {

        return $this->belongsTo(Gadgets::class, 'id');
    }
}
