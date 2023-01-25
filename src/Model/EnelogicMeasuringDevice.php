<?php

namespace App\Enelogic\Client\Model;

class EnelogicMeasuringDevice extends EnelogicEntity
{
    public function __construct(private ?int $id, public string $name, public string $alias)
    {
        parent::__construct($id);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }
}