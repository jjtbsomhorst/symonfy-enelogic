<?php

namespace jjtbsomhorst\enelogic\Client\Decoders;

use jjtbsomhorst\enelogic\Client\Model\EnelogicMeasuringDevice;
use jjtbsomhorst\enelogic\Client\Model\EnelogicMeasuringPoint;
use jjtbsomhorst\enelogic\Client\Model\EnelogicOrganization;

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