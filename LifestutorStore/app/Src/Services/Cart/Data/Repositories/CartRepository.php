<?php

namespace Services\Cart\Data\Repositories;

interface CartRepository
{
	/**
	 * [get description]
	 *
	 * @param  mixed $id
	 *
	 * @return Cart
	 */
    public function get($id);

    /**
     * [getBy description]
     *
     * @param  string $title
     *
     * @return Cart
     */
    public function getBy($title);

    /**
     * [all description]
     *
     * @return array
     */
    public function all();

    /**
     * [create description]
     *
     * @param  Cart $cart
     *
     * @return void
     */
    public function create($cart);

    /**
     * [update description]
     *
     * @param  Cart $cart
     *
     * @return void
     */
    public function update($cart);
}
