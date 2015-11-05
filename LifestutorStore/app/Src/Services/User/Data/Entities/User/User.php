<?php

namespace Services\User\Data\Entities\User;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Contracts\HasRoles as HasRolesContract;

use Foundation\Data\BaseEntity;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User extends BaseEntity implements HasRolesContract
{
    use HasRoles;

	/**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @ORM\column(type="string")
     */
    protected $password;

    /**
     * @ORM\Embedded(class = "Services\User\Data\Entities\User\Values\Contact")
     */
    protected $contact;

    /**
     * @ACL\HasRoles()
     * @var \Doctrine\Common\Collections\ArrayCollection|\LaravelDoctrine\ACL\Contracts\Role[]
     */
    protected $roles;

    public function getRoles()
    {
        return $this->roles;
    }
}
