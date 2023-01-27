<?php

namespace jjtbsomhorst\enelogic\Client\Decoders;

use jjtbsomhorst\enelogic\Client\Model\EnelogicMeasuringDevice;
use jjtbsomhorst\enelogic\Client\Model\EnelogicMeasuringPoint;

class MeasuringPointEntityDecoder extends BaseDecoder
{
    public function decodeEntity(array $jsonData)
    {
        return new EnelogicMeasuringPoint(
            $jsonData['id'],
            $jsonData['building'],
            $jsonData['mdId'],
            $jsonData['label'],
            $jsonData['dayMin'],
            $jsonData['dayMax'],
            $jsonData['monthMin'],
            $jsonData['monthMax'],
            $jsonData['yearMin'],
            $jsonData['yearMax'],
            $jsonData['timezone'],
            $jsonData['active'],
            $jsonData['created'],
            $jsonData['generation'],
            $jsonData['isCalculationMeter']
        );
    }
}