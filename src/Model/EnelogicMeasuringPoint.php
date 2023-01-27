<?php

namespace jjtbsomhorst\enelogic\Client\Model;

class EnelogicMeasuringPoint extends EnelogicEntity
{

    public function __construct(private ?int $id,
                                private ?int $buildingId,
                                private ?int $mdId,
                                private ?string $label,
                                private ?string $dayMin,
                                private ?string $dayMax,
                                private ?string $monthMin,
                                private ?string $monthMax,
                                private ?string $yearMin,
                                private ?string $yearMax,
                                private ?string $timezone,
                                private ?bool $active)
    {
        parent::__construct($id);
    }

    public function getBuildingId(): int
    {
        return $this->buildingId;
    }

    public function getMdId(): int
    {
        return $this->mdId;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getDayMin(): string
    {
        return $this->dayMin;
    }

    public function getDayMax(): string
    {
        return $this->dayMax;
    }

    public function getMonthMin(): string
    {
        return $this->monthMin;
    }

    public function getMonthMax(): string
    {
        return $this->monthMax;
    }

    public function getYearMin(): string
    {
        return $this->yearMin;
    }

    public function getYearMax(): string
    {
        return $this->yearMax;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getActive(): bool
    {
        return $this->active;
    }
}