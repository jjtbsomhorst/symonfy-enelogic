<?php

namespace App\Enelogic\Client\Decoders;

use App\Enelogic\Client\Model\EnelogicMeasuringDevice;
use App\Enelogic\Client\Model\EnelogicMeasuringPoint;
use App\Enelogic\Client\Model\EnelogicOrganization;

class OrganizationEntityDecoder extends BaseDecoder
{
    public function decodeEntity(array $jsonData)
    {
        return new EnelogicOrganization(
            $jsonData['website'],
            $jsonData['kvk'],
            $jsonData['partner'],
            $jsonData['id'],
            $jsonData['name'],
            $jsonData['email']
        );
    }
}