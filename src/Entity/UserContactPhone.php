<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
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


}