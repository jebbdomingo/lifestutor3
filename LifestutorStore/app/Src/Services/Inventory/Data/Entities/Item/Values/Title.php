<?php

namespace Services\Inventory\Data\Entities\Item\Values;

use Assert\Assertion;
use Doctrine\ORM\Mapping AS ORM;

use Foundation\Data\BaseValue;

/**
 * @ORM\Embeddable
 */
class Title extends BaseValue
{
    /**
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * Cosntructor
     * 
     * @param string $value
     */
    public function __construct($value)
    {
        Assertion::notEmpty($value);
        Assertion::string($value);

        $this->value = $value;
    }

    /**
     * [__toString description]
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
