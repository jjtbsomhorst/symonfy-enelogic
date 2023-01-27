<?php

namespace jjtbsomhorst\enelogic\Providers;

use jjtbsomhorst\enelogic\Decoders\MeasuringPointEntityDecoder;
use GuzzleHttp\Client;

class MeasuringPointProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "measuringpoints";
    public function __construct(Client $client) {
        parent::__construct($client, self::PRIMARY_PARAM, new MeasuringPointEntityDecoder());
    }
}