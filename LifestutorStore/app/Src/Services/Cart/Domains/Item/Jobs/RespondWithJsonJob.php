<?php

namespace Services\Cart\Domains\Item\Jobs;

use Foundation\AbstractJob;
use Illuminate\Pagination\LengthAwarePaginator;
use Services\Cart\Resources\Views\Transformers\ItemTransformer;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RespondWithJsonJob extends AbstractJob
{
    /**
     * @var Item
     */
    private $item;

    /**
     * [__construct description]
     *
     * @param mixed $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * [handle description]
     *
     * @param  ItemTransformer $itemTransformer
     *
     * @return array]
     */
    public function handle(ItemTransformer $itemTransformer)
    {
        if (is_array($this->item)) {
            $items = new LengthAwarePaginator($this->item, count($this->item), 5);

            return $this->response->paginator($items, $itemTransformer);
        }

        return $this->response->item($this->item, $itemTransformer);
    }
}
