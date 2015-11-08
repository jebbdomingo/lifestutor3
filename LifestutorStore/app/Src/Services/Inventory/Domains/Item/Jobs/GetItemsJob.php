<?php

namespace Services\Inventory\Domains\Item\Jobs;

use Foundation\AbstractJob;
use Services\Inventory\Data\Repositories\ItemRepository;

/**
 * A Domain Service which coordinates how the user is registered with the application
 * 
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetItemsJob extends AbstractJob
{
   /**
     * [handle description]
     *
     * @param  EntityManager $em
     *
     * @return User
     */
    public function handle(ItemRepository $repository)
    {
        return $repository->all();
    }
}
