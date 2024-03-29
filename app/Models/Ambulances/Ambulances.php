<?php

namespace App\Models\Ambulances;

use App\Models\Requests\Requests;
use App\Models\Status\status;
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
        'id_status',
        'device_token'
    ];

    public function status()
    {
        return $this->belongsTo(status::class, 'id_status');
    }

    public function requests()
    {
        return $this->hasMany(Requests::class, 'id');
    }
}
