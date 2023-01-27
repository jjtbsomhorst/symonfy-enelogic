<?php

namespace jjtbsomhorst\enelogic\Client\Providers;

use jjtbsomhorst\enelogic\Client\Decoders\MeasuringPointEntityDecoder;
use GuzzleHttp\Client;

class MeasuringPointProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "measuringpoints";
    public function __construct(Client $client) {
        parent::__construct($client, self::PRIMARY_PARAM, new MeasuringPointEntityDecoder());
    }
}