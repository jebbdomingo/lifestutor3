<?php

namespace Services\Inventory\Data\Repositories;

interface ItemRepository
{
	/**
	 * [get description]
	 *
	 * @param  mixed $id
	 *
	 * @return User
	 */
    public function get($id);

    /**
     * [getBy description]
     *
     * @param  string $title
     *
     * @return User
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
     * @param  User $user
     *
     * @return void
     */
    public function create($user);

    /**
     * [update description]
     *
     * @param  User $user
     *
     * @return void
     */
    public function update($user);
}
