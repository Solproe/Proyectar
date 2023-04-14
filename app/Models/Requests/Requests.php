<?php

namespace App\Models\Requests;

use App\Models\Data\Ambulances;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'id',
        'id_ambulance',
        'status',
        'type',
        'details',
        'started',
        'finished',
    ];

    function ambulances()
    {
        return $this->hasOne(Ambulances::class, 'id');
    }
}
