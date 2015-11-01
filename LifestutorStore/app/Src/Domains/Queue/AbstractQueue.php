<?php

namespace App\Src\Domains\Queue;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
abstract class AbstractQueue
{
    protected $name = '';
    
    public function __toString()
    {
        return $this->name;
    }
}
