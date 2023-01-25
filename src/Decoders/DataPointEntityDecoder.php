<?php

namespace App\Enelogic\Client\Decoders;

use App\Enelogic\Client\Model\EnelogicDateDataPoint;
use App\Enelogic\Client\Model\EnelogicDateTimeDataPoint;

class DataPointEntityDecoder extends BaseDecoder
{
    public function decodeEntity(array $jsonData)
    {
        if (array_key_exists('datetime', $jsonData)) {
            return new EnelogicDateTimeDataPoint(
                $jsonData['id'],
                $jsonData['quantity'],
                $jsonData['rate'],
                $jsonData['datetime']
            );
        }

        return new EnelogicDateDataPoint($jsonData['id'],
                $jsonData['quantity'],
                $jsonData['rate'],
                $jsonData['date']
        );
    }
}