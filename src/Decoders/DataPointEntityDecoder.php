<?php

namespace jjtbsomhorst\enelogic\Decoders;

use jjtbsomhorst\enelogic\Model\EnelogicDateDataPoint;
use jjtbsomhorst\enelogic\Model\EnelogicDateTimeDataPoint;

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