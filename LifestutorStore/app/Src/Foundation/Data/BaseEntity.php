<?php

namespace Foundation\Data;

class BaseEntity
{
    /**
     * Setter
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

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
