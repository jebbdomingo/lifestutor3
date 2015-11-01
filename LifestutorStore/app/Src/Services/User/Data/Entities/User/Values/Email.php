<?php

namespace Services\User\Data\Entities\User\Values;

use Assert\Assertion;
use Doctrine\ORM\Mapping AS ORM;

use Foundation\Data\BaseValue;

/**
 * @ORM\Embeddable
 */
class Email extends BaseValue
{
    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $email;

    /**
     * Cosntructor
     * 
     * @param string $email Email Address
     */
    public function __construct($email)
    {
        Assertion::email($email);

        $this->email = $email;
    }

    /**
     * [__toString description]
     *
     * @return mixed
     */
    public function __toString()
    {
        return $this->email;
    }
}
