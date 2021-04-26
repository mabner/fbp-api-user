<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

//https://symfony.com/doc/current/validation.html

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_address")
 */
class UserAddress
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=2)
     * @Assert\Choice(
     *     choices = {"AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"},
     *     message = "Please use a valid state initials."
     * )
     */
    private string $state;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private string $districtName;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private string $streetName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private string $houseNumber;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private string $addressComplement;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updatedAt = null;

}