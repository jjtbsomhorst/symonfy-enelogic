<?php

namespace jjtbsomhorst\enelogic\Decoders;

use jjtbsomhorst\enelogic\Model\EnelogicMeasuringDevice;

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