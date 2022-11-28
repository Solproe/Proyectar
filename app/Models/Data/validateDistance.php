<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Location\Coordinate;
use Location\Distance\Haversine;
use Location\Distance\Vincenty;
use Location\Line;

class validateDistance
{
    use HasFactory;

    public function getDistance(array $coordinate1, array $coordinate2)
    {
        $line = new Line(
            new Coordinate(floatval(str_replace(',', '.', $coordinate2[0])), floatval(str_replace(',', '.',$coordinate2[1]))),
            new Coordinate(floatval(str_replace(',', '.', $coordinate1[0])), floatval(str_replace(',', '.', $coordinate1[1])))
        );

        $calculator = new Vincenty();

        $data = $calculator->getDistance(new Coordinate(floatval(str_replace(',', '.', $coordinate2[0])), floatval(str_replace(',', '.',$coordinate2[1]))),
        new Coordinate(floatval(str_replace(',', '.', $coordinate1[0])), floatval(str_replace(',', '.', $coordinate1[1]))));

        return $data;
    }
}
