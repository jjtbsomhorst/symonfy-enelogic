<?php

namespace jjtbsomhorst\enelogic\Model;

class EnelogicEntity
{
    public function __construct( private ?int $id){}

    public function getId() : int
    {
        return $this->id;
    }
}