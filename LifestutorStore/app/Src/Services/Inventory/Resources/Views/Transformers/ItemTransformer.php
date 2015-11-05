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
            'title'       => $item->title->value,
            'description' => $item->description->value,
            'price'       => (float) $item->price->value,
            'quantity'    => (int) $item->quantity->value
        ];
    }
}
