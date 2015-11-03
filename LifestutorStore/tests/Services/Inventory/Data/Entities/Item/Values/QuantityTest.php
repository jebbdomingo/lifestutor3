<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Services\Inventory\Data\Entities\Item\Values\Quantity;

class QuantityTest extends TestCase
{
    /**
     * 
     * @return void
     */
    public function testShouldBeInteger()
    {
        $this->setExpectedException('Assert\AssertionFailedException');

        $price = new Quantity(5.5);
    }
}
