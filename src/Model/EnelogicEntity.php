<?php

namespace App\Enelogic\Client\Model;

class EnelogicEntity
{
    public function __construct( private ?int $id){}

    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    public function getId() : int
    {
        return $this->id;
    }
}