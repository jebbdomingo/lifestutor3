<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Services\Inventory\Data\Entities\Item\Item;
use Services\Inventory\Data\Entities\Item\Values\Title;
use Services\Inventory\Data\Entities\Item\Values\Description;
use Services\Inventory\Data\Entities\Item\Values\Price;
use Services\Inventory\Data\Entities\Item\Values\Quantity;
use Services\Inventory\Resources\Views\Transformers\ItemTransformer;

class ItemTransformerTest extends TestCase
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
        $this->item->id = 1;
    }

    /**
     * [testItemTransformerOutput description]
     */
    public function testItemTransformerOutput()
    {
        $expectedData = [
            'id'          => 1,
            'title'       => 'Test Item',
            'description' => 'Lorem ipsum dolor sit amet',
            'price'       => 10.00,
            'quantity'    => 5
        ];

        $transformer = new ItemTransformer;
        $data        = $transformer->transform($this->item);

        $this->assertSame($expectedData, $data);
    }
}
