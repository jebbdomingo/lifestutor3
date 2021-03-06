<?php

namespace Services\Cart\Data\Entities\Cart;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Foundation\Data\BaseEntity;
use Services\User\Data\Entities\User\User;

use Services\Inventory\Data\Entities\Item\Item as InventoryItem;

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
     * @ORM\OneToMany(targetEntity="Item", mappedBy="cart", cascade={"persist"}))
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

    /**
     * [getItems description]
     *
     * @return ArrayCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * [addItem description]
     *
     * @param integer $inventory_item
     * @param integer $quantity
     *
     * @return Item
     */
    public function addItem(InventoryItem $inventory_item, $quantity)
    {
        $item = new Item($inventory_item, $quantity);

        if (!$this->items->contains($item)) {
            $item->setCart($this);
            $this->items->add($item);
        }

        return $item;
    }
}
