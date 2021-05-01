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
    private int $id;

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


    public function __construct()
    {
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
    public function getId(): int
    {
        return $this->id;
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
    public function setAreaCode(int $areaCode): void
    {
        $this->areaCode = $areaCode;
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
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }
}
