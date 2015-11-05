<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Services\Inventory\Data\Entities\Item\Values\Title;

class TitleTest extends TestCase
{
    /**
     * Should require a value
     *
     * @return void
     */
    public function testShouldRequireTitle()
    {
        $this->setExpectedException('Exception');

        $title = new Title();
    }

    /**
     * Should return a value
     *
     * @return void
     */
    public function testShouldBeString()
    {
        $title = new Title('Test Item');

        $this->assertSame('Test Item', $title->value);
    }
}
