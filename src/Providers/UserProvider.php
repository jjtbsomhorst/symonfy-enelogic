<?php

namespace App\Enelogic\Client\Providers;

use App\Enelogic\Client\Decoders\UserEntityDecoder;
use App\Enelogic\Client\Model\EnelogicEntity;
use GuzzleHttp\Client;

class UserProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "user";
    public function __construct(Client $client)
    {
        parent::__construct($client, self::PRIMARY_PARAM, new UserEntityDecoder());
    }

    public function listItems($params = []): array
    {
        return [parent::getItem("")];
    }

    public function getItem(string $identifier): ?EnelogicEntity
    {
        return parent::getItem("");
    }
}