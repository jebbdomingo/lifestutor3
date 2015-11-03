<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Services\User\Data\Entities\User\Values\Contact;

class ContactTest extends TestCase
{
    /**
     * Should require an email address
     *
     * @return void
     */
    public function testShouldRequireEmail()
    {
        $this->setExpectedException('Exception');

        $contact = new Contact();
    }

    /**
     * Should require a valid email address
     *
     * @return void
     */
    public function testShouldRequireValidEmail()
    {
        $this->setExpectedException('Assert\AssertionFailedException');

        $contact = new Contact('this_is_not_a_valid_email');
    }

    /**
     * Should accept a valid email address
     *
     * @return void
     */
    public function testShouldAcceptValidEmail()
    {
        $email = new Contact('name@domain.com');

        $this->assertInstanceOf('Services\User\Data\Entities\User\Values\Contact', $email);
    }
}
