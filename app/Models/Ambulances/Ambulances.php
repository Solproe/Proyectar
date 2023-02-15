<?php

namespace App\Models\Ambulances;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulances extends Model
{
    use HasFactory;

    protected $table = "ambulances";

    protected $fillable = [
        'id',
        'plate',
        'type',
        'status',
        'device_token'
    ];
}
