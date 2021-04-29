<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;

//https://symfony.com/doc/current/validation.html
//https://pt.chahaoba.com/Brasil
//regexr.com/5rj28

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_contact_phone")
 */
class UserContactPhone
{
    /**
     * @Groups("contact_phone")
     * @MaxDepth(2)
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 11,
     *      max = 99,
     *      notInRangeMessage = "{{ value }} is not a valid area code.",
     * )
     */
    private int $area_code;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\NotBlank(message="Phone number required.")
     * @Assert\Regex(
     *     pattern     = "/^(\d{4})[-](\d{4})$"
     * )
     */
    private string $phone_number;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updated_at = null;

    /**
     * @Groups("contact_phone")
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="user_phone_number")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
     * Get the value of area_code
     *
     * @return int
     */
    public function getAreaCode(): int
    {
        return $this->area_code;
    }

    /**
     * Set the value of area_code
     *
     * @param int $area_code
     *
     * @return self
     */
    public function setAreaCode(int $area_code): self
    {
        $this->area_code = $area_code;
        $this->updated_at = new \DateTime();

        return $this;
    }

    /**
     * Get the value of phone_number
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * Set the value of phone_number
     *
     * @param string $phone_number
     *
     * @return self
     */
    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}