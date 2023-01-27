<?php

namespace jjtbsomhorst\enelogic\Decoders;

use jjtbsomhorst\enelogic\Model\EnelogicBuilding;

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