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
    private string $district_name;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private string $street_name;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private string $house_number;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private string $address_complement;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updated_at = null;


    public function __construct()
    {
        $this->created_at = new \DateTime();
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
        $this->updated_at = new \DateTime();

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
        $this->updated_at = new \DateTime();

        return $this;
    }
    /**
     * Get the value of district_name
     *
     * @return string
     */
    public function getDistrictName(): string
    {
        return $this->district_name;
    }

    /**
     * Set the value of district_name
     *
     * @param string $district_name
     *
     * @return self
     */
    public function setDistrictName(string $district_name): self
    {
        $this->district_name = $district_name;
        $this->updated_at = new \DateTime();

        return $this;
    }

    /**
     * Get the value of street_name
     *
     * @return string
     */
    public function getStreetName(): string
    {
        return $this->street_name;
    }

    /**
     * Set the value of street_name
     *
     * @param string $street_name
     *
     * @return self
     */
    public function setStreetName(string $street_name): self
    {
        $this->street_name = $street_name;
        $this->updated_at = new \DateTime();

        return $this;
    }

    /**
     * Get the value of house_number
     *
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->house_number;
    }

    /**
     * Set the value of house_number
     *
     * @param string $house_number
     *
     * @return self
     */
    public function setHouseNumber(string $house_number): self
    {
        $this->house_number = $house_number;
        $this->updated_at = new \DateTime();

        return $this;
    }

    /**
     * Get the value of address_complement
     *
     * @return string
     */
    public function getAddressComplement(): string
    {
        return $this->address_complement;
    }

    /**
     * Set the value of address_complement
     *
     * @param string $address_complement
     *
     * @return self
     */
    public function setAddressComplement(string $address_complement): self
    {
        $this->address_complement = $address_complement;
        $this->updated_at = new \DateTime();

        return $this;
    }

    /**
     * Get the value of created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @param \DateTime $created_at
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     *
     * @return ?\DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @param ?\DateTime $updated_at
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set the value of users
     */
    public function setUsers($users): self
    {
        $this->users = $users;

        return $this;
    }
}
