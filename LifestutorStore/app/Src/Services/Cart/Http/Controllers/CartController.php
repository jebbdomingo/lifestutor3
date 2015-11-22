<?php

namespace Services\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Foundation\Http\Controller;
use Services\Cart\Features\CreateCartFeature;
use Services\Cart\Features\AddItemFeature;
    /*Services\Cart\Features\UpdateCartFeature,
    Services\Cart\Features\GetCartFeature;*/

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * There will be one Cart created for each User registration
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return $this->serve(CreateCartFeature::class);
    }

    /**
     * [addItem description]
     *
     * @return \Illuminate\Http\Response
     */
    public function addItem()
    {
        return $this->serve(AddItemFeature::class);
    }

    /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //return $this->serve(UpdateCartFeature::class);
    }

    /**
     * [show description]
     *
     * @param  integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $this->serve(GetCartFeature::class, ['id' => $id]);
    }
}
