<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

//https://symfony.com/doc/current/validation.html
use Symfony\Component\Validator\Constraint as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_contact_phone")
 */
class UserContactPhone
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private ?int $id = null;

//    https://pt.chahaoba.com/Brasil
    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 11,
     *      max = 99,
     *      notInRangeMessage = "{{ value }} is not a valid area code.",
     * )
     */
    private int $areaCode;

//    regexr.com/5rj28
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


}