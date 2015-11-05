<?php

namespace Services\Inventory\Data\Entities\Item\Values;

use Assert\Assertion;
use Doctrine\ORM\Mapping AS ORM;

use Foundation\Data\BaseValue;

/**
 * @ORM\Embeddable
 */
class Description extends BaseValue
{
    /**
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * Cosntructor
     * 
     * @param string $value [optional]
     */
    public function __construct($value = null)
    {
        Assertion::string($value);
        
        $this->value = $value;
    }

    /**
     * [__toString value]
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
