<?php

namespace Services\User\Data\Entities\User;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Foundation\Data\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseEntity
{
	/**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Embedded(class = "Services\User\Data\Entities\User\Values\Email", columnPrefix = false)
     */
    protected $email;

    /**
     * @ORM\column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;
}
