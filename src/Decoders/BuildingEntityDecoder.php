<?php

namespace jjtbsomhorst\enelogic\Client\Decoders;

use jjtbsomhorst\enelogic\Client\Model\EnelogicBuilding;

class BuildingEntityDecoder extends BaseDecoder
{
    public function decodeEntity(array $jsonData)
    {
        return new EnelogicBuilding(
            $jsonData['id'],
            $jsonData['label'],
            $jsonData['address'],
            $jsonData['addressNo'],
            $jsonData['adddressAdd'] ?? null,
        $jsonData['zipCode'],
        $jsonData['location'],
        $jsonData['region'],
        $jsonData['country'],
        $jsonData['timezone'],
        $jsonData['created'],
        $jsonData['updated'],
        $jsonData['latitude'],
        $jsonData['longitude'],
        $jsonData['main']);
    }


}