<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Services\Inventory\Data\Entities\Item\Values\Price;

class PriceTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testShouldBeFloat()
    {
        $this->setExpectedException('Assert\AssertionFailedException');

        $price = new Price('10.00');
    }
}
