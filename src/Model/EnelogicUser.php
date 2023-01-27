<?php

namespace jjtbsomhorst\enelogic\Model;

class EnelogicUser extends EnelogicEntity
{
    public function __construct(private ?string $username,
                                private ?string $name,
                                private ?string $email,
                                private ?bool $active,
                                private ?string $lastLogin,
                                private ?int $id,
                                private ?int $addressNo,
                                private ?string $addressAdd,
                                private ?string $zipCode,
                                private ?string $phoneNumber)
    {
        parent::__construct($id);
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return bool|null
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return string|null
     */
    public function getLastLogin(): ?string
    {
        return $this->lastLogin;
    }

    /**
     * @return int|null
     */
    public function getAddressNo(): ?int
    {
        return $this->addressNo;
    }

    /**
     * @return string|null
     */
    public function getAddressAdd(): ?string
    {
        return $this->addressAdd;
    }

    /**
     * @return string|null
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

}