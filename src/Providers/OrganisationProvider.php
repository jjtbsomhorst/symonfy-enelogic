<?php

namespace App\Enelogic\Client\Providers;

use App\Enelogic\Client\Decoders\BaseDecoder;
use App\Enelogic\Client\Decoders\OrganizationEntityDecoder;
use GuzzleHttp\Client;

class OrganisationProvider extends BaseProvider
{
    const PRIMARY_PARAM = "organization";
    public function __construct(Client $client)
    {
        parent::__construct($client, OrganisationProvider::PRIMARY_PARAM, new OrganizationEntityDecoder());
    }
}