<?php

namespace Services\Inventory\Domains\Item\Jobs;

use Foundation\AbstractJob;
use Services\Inventory\Data\Entities\Item\Item;
use Services\Inventory\Data\Entities\Item\Values\Title;
use Services\Inventory\Data\Entities\Item\Values\Description;
use Services\Inventory\Data\Entities\Item\Values\Price;
use Services\Inventory\Data\Entities\Item\Values\Quantity;
use Services\Inventory\Data\Repositories\ItemRepository;

/**
 * A Domain Service which coordinates how the user is registered with the application
 * 
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class CreateItemJob extends AbstractJob
{
    private $title;
    private $description;
    private $price;
    private $quantity;

    public function __construct($title, $description, $price, $quantity)
    {
        $this->title       = $title;
        $this->description = $description;
        $this->price       = $price;
        $this->quantity    = $quantity;
    }

    public function handle(ItemRepository $repository)
    {
        $item = new Item(
            new Title($this->title),
            new Description($this->description),
            new Price((float) $this->price),
            new Quantity((int) $this->quantity)
        );

        $repository->create($item);

        return $item;
    }
}
