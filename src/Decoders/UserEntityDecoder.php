<?php

namespace jjtbsomhorst\enelogic\Client\Decoders;

use jjtbsomhorst\enelogic\Client\Model\EnelogicUser;

class UserEntityDecoder extends BaseDecoder
{
    public function decodeEntity(array $jsonData): EnelogicUser
    {
        return new EnelogicUser(
            $jsonData['username'] ?? null,
            $jsonData['name'] ?? null,
            $jsonData['email'] ?? null,
            $jsonData['active'] ?? null,
            $jsonData['lastLogin'] ?? null,
            $jsonData['id'] ?? null,
            $jsonData['addressNo'] ?? null,
            $jsonData['addressAdd'] ?? null,
            $jsonData['zipCode'] ?? null,
            $jsonData['phoneNumber'] ?? null);
    }
}