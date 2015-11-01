<?php

namespace Services\User\Http\Controllers;

use Illuminate\Http\Request;
use Foundation\Http\Controller;
use Services\User\Features\RegisterUserFeature;
use Services\User\Features\GetUserFeature;
use Services\User\Features\GetUsersFeature;

class UserController extends Controller
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
        return $this->serve(RegisterUserFeature::class);
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
        return $this->serve(GetUserFeature::class, ['id' => $id]);
    }

    public function index()
    {
        return $this->serve(GetUsersFeature::class);
    }
}
