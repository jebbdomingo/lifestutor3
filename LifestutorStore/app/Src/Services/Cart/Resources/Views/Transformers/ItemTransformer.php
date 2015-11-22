<?php

namespace Services\Cart\Resources\Views\Transformers;

use League\Fractal\TransformerAbstract;
use Services\Cart\Data\Entities\Cart\Item;

class ItemTransformer extends TransformerAbstract
{
    public function transform(Item $item)
    {
        return [
            'id'             => (int) $item->id,
            'title'          => $item->getInventoryItem()->title->value,
            'description'    => $item->getInventoryItem()->description->value,
            'price'          => $item->getInventoryItem()->price->value,
            'quantity'       => (int) $item->quantity,
            'published'      => (boolean) 1
        ];
    }
}
