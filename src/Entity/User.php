<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

//https://symfony.com/doc/current/validation.html

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
     *     minMessage="Fisrt name requires a minimum of 2 characters."
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
     * @ORM\OneToMany(targetEntity="UserContactPhone", mappedBy="user", cascade="persist")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="phoneNumberId", referencedColumnName="id", unique=true)}
     *      )
     */
    private $user_phone_number; // ArrayCollection?

    /**
     * @ORM\OneToOne(targetEntity="UserAddress", mappedBy="user", cascade="persist")
     * @ORM\JoinColumn(name="user_address_id", referencedColumnName="id")
     */
    private $user_address; // UserAddress ?


}