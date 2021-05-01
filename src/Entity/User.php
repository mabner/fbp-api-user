<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;

//https://symfony.com/doc/current/validation.html
//https://symfony.com/doc/current/doctrine/associations.html
//https://symfonycasts.com/screencast/symfony2-ep3/doctrine-inverse-relation

//$this->updatedAt = new \DateTime();
/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @Groups("user")
     * @MaxDepth(2)
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\NotBlank(message="First name required.")
     * @Assert\Length(
     *     min=2,
     *     max=80,
     *     minMessage="First name requires a minimum of 2 characters."
     * )
     */
    private string $firstName;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\NotBlank(message="Last name required.")
     * @Assert\Length(
     *     min=2,
     *     max=80,
     *     minMessage="Last name requires a minimum of 2 characters."
     * )
     */
    private string $lastName;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\NotBlank(message="Email address required.")
     * @Assert\Email(
     *     message = "'{{ value }}' is not valid email address."
     * )
     */
    private string $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updatedAt = null;

    /**
     * @ORM\OneToMany(targetEntity="UserContactPhone",cascade="persist", mappedBy="phone")
     * @ORM\JoinColumn(name="phoneId", referencedColumnName="id")
     */
    private $userPhoneNumber; // ArrayCollection?


    /**
     * @ORM\ManyToOne(targetEntity="UserAddress", cascade={"remove"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $userAddress; // ArrayCollection?

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->userPhoneNumber = new ArrayCollection;
        $this->userAddress = new ArrayCollection;
    } // UserAddress ?

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
     * Get the value of firstName
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Get the value of lastName
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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
     * Get the value of updatedAt
     *
     * @return ?\DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Get the value of userPhoneNumber
     */
    public function getUserPhoneNumber()
    {
        return $this->userPhoneNumber;
    }

    /**
     * Set the value of userPhoneNumber
     */
    public function setUserPhoneNumber($userPhoneNumber): void
    {
        $this->userPhoneNumber = $userPhoneNumber;
    }

    /**
     * Get the value of userAddress
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * Set the value of userAddress
     */
    public function setUserAddress($userAddress): void
    {
        $this->userAddress = $userAddress;
    }
}
