<?php

namespace jjtbsomhorst\enelogic\Decoders;

use jjtbsomhorst\enelogic\Model\EnelogicMeasuringDevice;
use jjtbsomhorst\enelogic\Model\EnelogicMeasuringPoint;

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