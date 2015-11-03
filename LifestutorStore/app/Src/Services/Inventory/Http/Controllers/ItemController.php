<?php

namespace Services\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Foundation\Http\Controller;
use Services\Inventory\Features\CreateItemFeature;

class ItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(CreateItemFeature::class);
    }
}
