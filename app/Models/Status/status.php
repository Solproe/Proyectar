<?php

namespace App\Models\Status;

use App\Models\Ambulances\Ambulances;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable= [
        'id',
        'name'
    ];

    public function ambulances () {
        return $this->hasMany(Ambulances::class);
    }
}
