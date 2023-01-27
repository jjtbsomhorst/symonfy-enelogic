<?php

namespace jjtbsomhorst\enelogic\Client\Providers;

use jjtbsomhorst\enelogic\Client\Decoders\BaseDecoder;
use jjtbsomhorst\enelogic\Client\Decoders\OrganizationEntityDecoder;
use GuzzleHttp\Client;

class OrganisationProvider extends BaseProvider
{
    const PRIMARY_PARAM = "organization";
    public function __construct(Client $client)
    {
        parent::__construct($client, OrganisationProvider::PRIMARY_PARAM, new OrganizationEntityDecoder());
    }
}