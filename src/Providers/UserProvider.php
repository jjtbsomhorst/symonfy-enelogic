<?php

namespace jjtbsomhorst\enelogic\Providers;

use jjtbsomhorst\enelogic\Decoders\UserEntityDecoder;
use jjtbsomhorst\enelogic\Model\EnelogicEntity;
use GuzzleHttp\Client;

class UserProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "user";
    public function __construct(Client $client)
    {
        parent::__construct($client, self::PRIMARY_PARAM, new UserEntityDecoder());
    }

    public function listItems(): array
    {
        return [parent::getItem("")];
    }

    public function getItem(string $identifier): ?EnelogicEntity
    {
        return parent::getItem("");
    }
}