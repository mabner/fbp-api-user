<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;

//https://symfony.com/doc/current/validation.html

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_address")
 */
class UserAddress
{
    /**
     * @Groups("address")
     * @MaxDepth(2)
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=2)
     * @Assert\Choice(
     *     choices = {"AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"},
     *     message = "Please use a valid state initials."
     * )
     */
    private string $state;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private string $districtName;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private string $streetName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private string $houseNumber;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private string $addressComplement;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updatedAt = null;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of state
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param string $state
     *
     * @return self
     */
    public function setState(string $state): self
    {
        $this->state = $state;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;
        $this->updatedAt = new \DateTime();

        return $this;
    }
    /**
     * Get the value of districtName
     *
     * @return string
     */
    public function getDistrictName(): string
    {
        return $this->districtName;
    }

    /**
     * Set the value of districtName
     *
     * @param string $districtName
     *
     * @return self
     */
    public function setDistrictName(string $districtName): self
    {
        $this->districtName = $districtName;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get the value of streetName
     *
     * @return string
     */
    public function getStreetName(): string
    {
        return $this->streetName;
    }

    /**
     * Set the value of streetName
     *
     * @param string $streetName
     *
     * @return self
     */
    public function setStreetName(string $streetName): self
    {
        $this->streetName = $streetName;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get the value of houseNumber
     *
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * Set the value of houseNumber
     *
     * @param string $houseNumber
     *
     * @return self
     */
    public function setHouseNumber(string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get the value of addressComplement
     *
     * @return string
     */
    public function getAddressComplement(): string
    {
        return $this->addressComplement;
    }

    /**
     * Set the value of addressComplement
     *
     * @param string $addressComplement
     *
     * @return self
     */
    public function setAddressComplement(string $addressComplement): self
    {
        $this->addressComplement = $addressComplement;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get the value of createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     *
     * @return ?\DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param ?\DateTime $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
