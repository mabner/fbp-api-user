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
     * @ORM\OneToMany(targetEntity="UserContactPhone",cascade="persist")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="userId", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="phoneNumberId", referencedColumnName="id", unique=true)}
     *      )
     */
    private $userPhoneNumber; // ArrayCollection?

    /**
     * @ORM\OneToOne(targetEntity="UserAddress",cascade="persist")
     * @ORM\JoinColumn(name="userAddressId", referencedColumnName="id")
     */
    private $userAddress;


}