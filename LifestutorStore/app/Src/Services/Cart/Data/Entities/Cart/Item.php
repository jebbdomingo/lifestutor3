<?php

namespace Services\Cart\Data\Entities\Cart;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Foundation\Data\BaseEntity;

use Services\Inventory\Data\Entities\Item\Item as InventoryItem;

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
     * @ORM\ManyToONe(targetEntity="Services\Inventory\Data\Entities\Item\Item")
     * @ORM\JoinColumn(name="inventory_item_id", referencedColumnName="id")
     **/
    private $item;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;

    /**
     * [__construct description]
     *
     * @param InventoryItem $item     [description]
     * @param integer       $quantity [description]
     */
    public function __construct(InventoryItem $item, $quantity)
    {
        $this->setInventoryItem($item);

        $this->quantity = $quantity;
    }

    /**
     * [setCart description]
     *
     * @param Cart $cart [description]
     */
    public function setCart(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * [setInventoryItem description]
     *
     * @param InventoryItem $item [description]
     */
    public function setInventoryItem(InventoryItem $item)
    {
        $this->item = $item;
    }

    public function getInventoryItem()
    {
        return $this->item;
    }
}
