<?php

namespace App\Enelogic\Client\Decoders;

use App\Enelogic\Client\Model\EnelogicMeasuringDevice;

class MeasuringDeviceEntityDecoder extends BaseDecoder
{
    public function decodeEntity(array $jsonData)
    {
        return new EnelogicMeasuringDevice(
            $jsonData['id'],
            $jsonData['name'],
            $jsonData['alias']
        );
    }
}