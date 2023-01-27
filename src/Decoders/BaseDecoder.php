<?php

namespace jjtbsomhorst\enelogic\Client\Decoders;

abstract class BaseDecoder
{
    public function decodeEntity(array $jsonData){}
    public function decodeList(string $jsonData) {
            return array_map(function($entity){
                return $this->decodeEntity($entity);
            }, json_decode($jsonData,true));
    }
}