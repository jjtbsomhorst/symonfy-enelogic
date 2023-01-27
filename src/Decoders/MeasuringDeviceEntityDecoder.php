<?php

namespace jjtbsomhorst\enelogic\Client\Decoders;

use jjtbsomhorst\enelogic\Client\Model\EnelogicMeasuringDevice;

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