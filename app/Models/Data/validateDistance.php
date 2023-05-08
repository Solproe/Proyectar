<?php

namespace App\Models\Data;

use App\Models\Ambulances\Ambulances;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Location\Coordinate;
use Location\Distance\Vincenty;
use Location\Line;

class validateDistance
{
    use HasFactory;

    public $id_ambulance;

    public function getDistance(array $coordinate1, array $coordinate2): float
    {
        $line = new Line(
            new Coordinate(floatval(str_replace(',', '.', $coordinate2[0])), floatval(str_replace(',', '.',$coordinate2[1]))),
            new Coordinate(floatval(str_replace(',', '.', $coordinate1[0])), floatval(str_replace(',', '.', $coordinate1[1])))
        );

        $calculator = new Vincenty();

        $data = $calculator->getDistance(new Coordinate(floatval(str_replace(',', '.', $coordinate2[0])), floatval(str_replace(',', '.',$coordinate2[1]))),
            new Coordinate(floatval(str_replace(',', '.', $coordinate1[0])), floatval(str_replace(',', '.', $coordinate1[1]))));

        return round($data / 1000, 3);
    }

    public function nearestDevice($devices, array $fate, $typeRequest): Ambulances
    {
        $minDeviceDistance = null;

        $oldDistance = null;

        $newDistance = null;

        foreach ($devices->TrackingSDT as $device)
        {
            $ambulace = Ambulances::where('plate', substr($device->Plate, 0, 6))->first();

            if (isset($ambulace->type) && $ambulace->type == $typeRequest && $ambulace->status->name == 'free')
            {
                $newDistance = $this->getDistance([$device->Latitud, $device->Longitud], [$fate[0], $fate[1]]);

                if ($oldDistance == null)
                {
                    $oldDistance = $newDistance;

                    $minDeviceDistance = $ambulace;
                }
                elseif ($newDistance <= $oldDistance)
                {
                    $minDeviceDistance = $ambulace;

                }
            }
        }

        return $minDeviceDistance;
    }
}
