<?php

namespace jjtbsomhorst\enelogic\Client\Providers;

use jjtbsomhorst\enelogic\Client\Decoders\BaseDecoder;
use jjtbsomhorst\enelogic\Client\Decoders\MeasuringDeviceEntityDecoder;
use GuzzleHttp\Client;

class DeviceProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "measuringdevices";
    public function __construct(Client $client)
    {
        parent::__construct($client, self::PRIMARY_PARAM, new MeasuringDeviceEntityDecoder());
    }

}