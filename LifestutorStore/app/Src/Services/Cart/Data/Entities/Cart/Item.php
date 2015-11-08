<?php

namespace Services\Cart\Data\Entities\Cart;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Foundation\Data\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="cart_items")
 */
class Item extends BaseEntity
{
	/**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Cart", inversedBy="items")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     **/
    protected $cart;

    /**
     * @ORM\OneToOne(targetEntity="Services\Inventory\Data\Entities\Item\Item")
     * @ORM\JoinColumn(name="inventory_item_id", referencedColumnName="id")
     **/
    private $item;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;
}
