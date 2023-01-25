<?php

namespace App\Enelogic\Client\Model;

class EnelogicBuilding extends EnelogicEntity
{
    private int $id;
    private string $label;
    private string $address;
    private int $addressNo;
    private ?string $addressAdd;
    private bool $main;
    private string $timezone;
    private string $country;
    private string $region;
    private string $location;
    private string $zipCode;
    private string $created;
    private string $updated;
    private float $latitude;
    private float $longtitude;
    public function __construct(
        ?int $id,
        string $label,
        string $address,
        int $addressNo,
        ?string $addressAdd,
        string $zipCode,
        string $location,
        string $region,
        string $country,
        string $timezone,
        string $created,
        string $updated,
        float $latitude,
        float $longtitude,
        bool $main)
    {
        $this->id = $id;
        $this->label = $label;
        $this->address = $address;
        $this->addressNo = $addressNo;
        $this->addressAdd = $addressAdd;
        $this->zipCode = $zipCode;
        $this->location = $location;
        $this->region = $region;
        $this->country = $country;
        $this->timezone = $timezone;
        $this->main = $main;
        $this->created = $created;
        $this->updated = $updated;
        $this->latitude =$latitude;
        $this->longtitude = $longtitude;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getAddressNo(): int
    {
        return $this->addressNo;
    }

    public function getAddressAdd(): string
    {
        return $this->addressAdd;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getMain(): bool
    {
        return $this->main;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function getUpdated(): string
    {
        return $this->updated;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongtitude(): float
    {
        return $this->longtitude;
    }


}