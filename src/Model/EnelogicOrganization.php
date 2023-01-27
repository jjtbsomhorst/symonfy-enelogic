<?php

namespace jjtbsomhorst\enelogic\Client\Model;

class EnelogicOrganization extends EnelogicEntity
{
    public function __construct(public string $website,
                                public string $kvk,
                                public bool $partner,
                                private ?int $id,
                                public string $name,
                                public string $email)
    {
        parent::__construct($id);
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function getKvk(): string
    {
        return $this->kvk;
    }

    public function getPartner(): bool
    {
        return $this->partner;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}