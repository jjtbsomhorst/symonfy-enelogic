<?php

namespace App\Enelogic\Client\Providers;

use App\Enelogic\Client\Model\EnelogicEntity;

interface IEntityProvider
{
    public function listItems(array $params = []) : array;

    public function getItem(string $identifier) : ?EnelogicEntity;
}