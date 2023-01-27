<?php

namespace jjtbsomhorst\enelogic\Providers;

use jjtbsomhorst\enelogic\Model\EnelogicEntity;

interface IEntityProvider
{
    public function listItems() : array;

    public function getItem(string $identifier) : ?EnelogicEntity;
}