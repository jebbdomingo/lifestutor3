<?php

namespace Foundation\Data;

class BaseValue
{
    /**
     * Accessor
     *
     * @param  string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
