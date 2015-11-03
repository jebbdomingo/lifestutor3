<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Services\Inventory\Data\Entities\Item\Item;
use Services\Inventory\Data\Entities\Item\Values\Title;
use Services\Inventory\Data\Entities\Item\Values\Description;
use Services\Inventory\Data\Entities\Item\Values\Price;
use Services\Inventory\Data\Entities\Item\Values\Quantity;

class ItemTest extends TestCase
{
    protected $item;

    /**
     * Should require a value
     *
     * @return void
     */
    public function setup()
    {
        /*
         * Create an Item
         */
        $this->item = new Item(
            new Title('Test Item'),
            new Description('Lorem ipsum dolor sit amet'),
            new Price(10.00),
            new Quantity(5)
        );

        /*
         * Add photos of the Item
         */
        /*$this->item->addPhoto(new Photo());
        $this->item->addPhoto(new Photo());*/
    }

    public function testItem()
    {
        $this->markTestSkipped('TODO');
    }
}
