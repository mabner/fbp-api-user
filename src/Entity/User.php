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

//$this->updated_at = new \DateTime();
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
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\NotBlank(message="First name required.")
     * @Assert\Length(
     *     min=2,
     *     max=80,
     *     minMessage="First name requires a minimum of 2 characters."
     * )
     */
    private string $first_name;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\NotBlank(message="Last name required.")
     * @Assert\Length(
     *     min=2,
     *     max=80,
     *     minMessage="Last name requires a minimum of 2 characters."
     * )
     */
    private string $last_name;

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
    private \DateTime $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updated_at = null;

    /**
     * @ORM\OneToMany(targetEntity="UserContactPhone",cascade="persist", mappedBy="phone")
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     */
    private $user_phone_number; // ArrayCollection?


    /**
     * @ORM\ManyToOne(targetEntity="UserAddress", cascade={"remove"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $user_address; // ArrayCollection?

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->user_phone_number = new ArrayCollection;
        $this->user_address = new ArrayCollection;
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
     * Get the value of first_name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @param string $first_name
     *
     * @return self
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @param string $last_name
     *
     * @return self
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
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
    public function setEmail(string $email): self
    {
        $this->email = $email;

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
     * Get the value of user_phone_number
     */
    public function getUserPhoneNumber()
    {
        return $this->user_phone_number;
    }

    /**
     * Set the value of user_phone_number
     */
    public function setUserPhoneNumber($user_phone_number): self
    {
        $this->user_phone_number = $user_phone_number;

        return $this;
    }

    /**
     * Get the value of user_address
     */
    public function getUserAddress()
    {
        return $this->user_address;
    }

    /**
     * Set the value of user_address
     */
    public function setUserAddress($user_address): self
    {
        $this->user_address = $user_address;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }
}