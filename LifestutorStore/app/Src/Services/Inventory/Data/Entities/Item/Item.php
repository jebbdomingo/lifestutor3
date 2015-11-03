<?php

namespace Services\Inventory\Data\Entities\Item;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Foundation\Data\BaseEntity;

use Services\Inventory\Data\Entities\Item\Values\Title,
    Services\Inventory\Data\Entities\Item\Values\Description,
    Services\Inventory\Data\Entities\Item\Values\Price,
    Services\Inventory\Data\Entities\Item\Values\Quantity;

/**
 * @ORM\Entity
 * @ORM\Table(name="items")
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
     * @ORM\Embedded(class = "Services\Inventory\Data\Entities\Item\Values\Title", columnPrefix = false)
     */
    protected $title;

    /**
     * @ORM\Embedded(class = "Services\Inventory\Data\Entities\Item\Values\Description", columnPrefix = false)
     */
    protected $description;

    /**
     * @ORM\Embedded(class = "Services\Inventory\Data\Entities\Item\Values\Price", columnPrefix = false)
     */
    protected $price;

    /**
     * @ORM\Embedded(class = "Services\Inventory\Data\Entities\Item\Values\Quantity", columnPrefix = false)
     */
    protected $quantity;

    /**
     * [__construct description]
     *
     * @param Title       $title
     * @param Description $description
     * @param Price       $price
     * @param Quantity    $quantity
     */
    public function __construct(
        Title $title,
        Description $description,
        Price $price,
        Quantity $quantity
    )
    {
        $this->title       = $title;
        $this->description = $description;
        $this->price       = $price;
        $this->quantity    = $quantity;
    }
}
