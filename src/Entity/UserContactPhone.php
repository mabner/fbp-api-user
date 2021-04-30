<?php

namespace App\Entity;

use App\Entity\User;
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
     * @Groups("phone")
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
    private int $areaCode;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\NotBlank(message="Phone number required.")
     * @Assert\Regex(
     *     pattern     = "/^(\d{4})[-](\d{4})$"
     * )
     */
    private string $phoneNumber;

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
     * @ORM\ManyToOne(
     *      targetEntity="User",
     *      inversedBy="events"
     * )
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $phone;


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
     * Get the value of areaCode
     *
     * @return int
     */
    public function getAreaCode(): int
    {
        return $this->areaCode;
    }

    /**
     * Set the value of areaCode
     *
     * @param int $areaCode
     *
     * @return self
     */
    public function setAreaCode(int $areaCode): self
    {
        $this->areaCode = $areaCode;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get the value of phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
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
