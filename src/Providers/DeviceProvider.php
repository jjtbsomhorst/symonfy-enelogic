<?php

namespace App\Enelogic\Client\Providers;

use App\Enelogic\Client\Decoders\BaseDecoder;
use App\Enelogic\Client\Decoders\MeasuringDeviceEntityDecoder;
use GuzzleHttp\Client;

class DeviceProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "measuringdevices";
    public function __construct(Client $client)
    {
        parent::__construct($client, self::PRIMARY_PARAM, new MeasuringDeviceEntityDecoder());
    }

}