<?php

namespace Foundation\Http;

use App\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController
{
    /**
     * Serve the given feature with the given arguments.
     *
     * @param \App\Src\Foundation\AbstractFeature $feature
     * @param array                               $arguments
     *
     * @return mixed
     */
    public function serve($feature, $arguments = [])
    {
        return $this->dispatchFromArray($feature, $arguments);
    }
}
