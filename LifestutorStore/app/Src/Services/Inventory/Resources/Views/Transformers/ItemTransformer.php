<?php

namespace Services\Inventory\Resources\Views\Transformers;

use League\Fractal\TransformerAbstract;
use Services\Inventory\Data\Entities\Item\Item;

class ItemTransformer extends TransformerAbstract
{
    public function transform(Item $item)
    {
        return [
            'id'          => (int) $item->id,
            'title'       => sprintf($item->title),
            'description' => sprintf($item->description),
            'price'       => (float) sprintf($item->price),
            'quantity'    => (int) sprintf($item->quantity)
        ];
    }
}
