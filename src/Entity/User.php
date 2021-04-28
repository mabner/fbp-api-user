<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

//https://symfony.com/doc/current/validation.html
//https://symfony.com/doc/current/doctrine/associations.html


/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User
{
    /**
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
     * @ORM\OneToMany(targetEntity=UserContactPhone::class, mappedBy="user")
     */
    private $user_phone_number;

    /**
     * @ORM\OneToOne(targetEntity=UserAddress::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $user_address;


    public function __construct()
    {
        $this->user_phone_number = new ArrayCollection();
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

    public function addUserPhoneNumber(UserContactPhone $userPhoneNumber): self
    {
        if (!$this->user_phone_number->contains($userPhoneNumber)) {
            $this->user_phone_number[] = $userPhoneNumber;
            $userPhoneNumber->setUser($this);
        }

        return $this;
    }

    public function removeUserPhoneNumber(UserContactPhone $userPhoneNumber): self
    {
        if ($this->user_phone_number->removeElement($userPhoneNumber)) {
            // set the owning side to null (unless already changed)
            if ($userPhoneNumber->getUser() === $this) {
                $userPhoneNumber->setUser(null);
            }
        }

        return $this;
    }
}
