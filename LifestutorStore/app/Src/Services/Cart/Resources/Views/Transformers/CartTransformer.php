<?php

namespace Services\Cart\Resources\Views\Transformers;

use League\Fractal\TransformerAbstract;
use Services\Cart\Data\Entities\Cart\Cart;

class CartTransformer extends TransformerAbstract
{
    public function transform(Cart $cart)
    {
        return [
            'id'             => (int) $cart->id,
            'published'      => (boolean) 1,
            'date_published' => 'September 13, 2015',
            'active'         => (int) 1
        ];
    }
}
