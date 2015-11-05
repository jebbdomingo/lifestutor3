<?php

namespace Services\User\Data\Roles;

use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;

/**
 * @ORM\Entity()
 */
class Role implements RoleContract
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $permission
     *
     * @return bool
     */
    public function hasPermissionTo($permission)
    {}

    /**
     * @return ArrayCollection|Permission[]
     */
    public function getPermissions()
    {}
}
