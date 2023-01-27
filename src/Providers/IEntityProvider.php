<?php

namespace jjtbsomhorst\enelogic\Client\Providers;

use jjtbsomhorst\enelogic\Client\Model\EnelogicEntity;

interface IEntityProvider
{
    public function listItems() : array;

    public function getItem(string $identifier) : ?EnelogicEntity;
}