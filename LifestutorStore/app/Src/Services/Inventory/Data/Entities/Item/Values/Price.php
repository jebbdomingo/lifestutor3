<?php

namespace Services\Inventory\Data\Entities\Item\Values;

use Assert\Assertion;
use Doctrine\ORM\Mapping AS ORM;

use Foundation\Data\BaseValue;

/**
 * @ORM\Embeddable
 */
class Price extends BaseValue
{
    /**
     * @ORM\Column(type="float")
     */
    protected $value;

    /**
     * Cosntructor
     * 
     * @param string $value [optional]
     */
    public function __construct($value = null)
    {
        Assertion::float($value);
        
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
