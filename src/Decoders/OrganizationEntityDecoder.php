<?php

namespace jjtbsomhorst\enelogic\Decoders;

use jjtbsomhorst\enelogic\Model\EnelogicMeasuringDevice;
use jjtbsomhorst\enelogic\Model\EnelogicMeasuringPoint;
use jjtbsomhorst\enelogic\Model\EnelogicOrganization;

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