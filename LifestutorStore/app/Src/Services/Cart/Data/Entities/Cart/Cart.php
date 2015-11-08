<?php

namespace Services\Cart\Data\Entities\Cart;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Foundation\Data\BaseEntity;
use Services\User\Data\Entities\User\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="carts")
 */
class Cart extends BaseEntity
{
	/**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Services\User\Data\Entities\User\User", inversedBy="cart")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="cart")
     **/
    protected $items;

    /**
     * @ORM\Column(type="datetime", name="modified_on", nullable=true)
     */
    protected $modifiedOn;

    /**
     * [__construct description]
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user  = $user;
        $this->items = new ArrayCollection();
    }
}
