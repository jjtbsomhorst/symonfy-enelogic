<?php

namespace jjtbsomhorst\enelogic\Providers;

use jjtbsomhorst\enelogic\Decoders\BaseDecoder;
use jjtbsomhorst\enelogic\Decoders\MeasuringDeviceEntityDecoder;
use GuzzleHttp\Client;

class DeviceProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "measuringdevices";
    public function __construct(Client $client)
    {
        parent::__construct($client, self::PRIMARY_PARAM, new MeasuringDeviceEntityDecoder());
    }

}