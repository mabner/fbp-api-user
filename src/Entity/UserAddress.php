<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_address")
 */
class UserAddress {
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private ?int $id = null;

    private $user;
    private string $state;
    private string $city;
    private string $districtName;
    private string $streetName;
    private string $houseNumber;
    private string $addressComplement;

}