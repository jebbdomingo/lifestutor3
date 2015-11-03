<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Services\Inventory\Data\Entities\Item\Values\Description;

class DescriptionTest extends TestCase
{
    /**
     * 
     * @return void
     */
    public function testShouldbeString()
    {
        $description = new Description('Lorem ipsum');

        $this->assertSame('Lorem ipsum', sprintf($description));
    }
}
