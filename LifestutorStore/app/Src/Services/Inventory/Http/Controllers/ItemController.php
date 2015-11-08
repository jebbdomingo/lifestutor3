<?php

namespace Services\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Foundation\Http\Controller;
use Services\Inventory\Features\CreateItemFeature,
    Services\Inventory\Features\GetItemsFeature,
    Services\Inventory\Features\GetItemFeature;

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

    /**
     * [index description]
     *
     * @return response
     */
    public function index()
    {
        return $this->serve(GetItemsFeature::class);
    }

    /**
     * [show description]
     *
     * @param  integer $id
     *
     * @return response
     */
    public function show($id)
    {
        return $this->serve(GetItemFeature::class, ['id' => $id]);
    }
}
