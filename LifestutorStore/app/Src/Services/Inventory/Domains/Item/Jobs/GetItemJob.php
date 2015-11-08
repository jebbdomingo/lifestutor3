<?php

namespace Services\Inventory\Domains\Item\Jobs;

use Foundation\AbstractJob;
use Foundation\Assertion;
use Services\Inventory\Data\Repositories\ItemRepository;

/**
 * A Domain Service which coordinates how the user is registered with the application
 * 
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetItemJob extends AbstractJob
{
   /**
     * [$id description]
     *
     * @var integer
     */
    private $id;

    /**
     * [__construct description]
     *
     * @param integer $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * [handle description]
     *
     * @param  UserRepository $repository
     *
     * @return User
     */
    public function handle(ItemRepository $repository)
    {
        $item = $repository->get($this->id);

        Assertion::entityExists($item, "Item with ID '{$this->id}' not found");

        return $item;
    }
}
