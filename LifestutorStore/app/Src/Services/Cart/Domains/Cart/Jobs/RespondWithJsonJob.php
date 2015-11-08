<?php

namespace Services\Cart\Domains\Cart\Jobs;

use Foundation\AbstractJob;
use Illuminate\Pagination\LengthAwarePaginator;
use Services\Cart\Resources\Views\Transformers\CartTransformer;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RespondWithJsonJob extends AbstractJob
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * [__construct description]
     *
     * @param mixed $cart
     */
    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    /**
     * [handle description]
     *
     * @param  CartTransformer $cartTransformer
     *
     * @return array]
     */
    public function handle(CartTransformer $cartTransformer)
    {
        if (is_array($this->cart)) {
            $carts = new LengthAwarePaginator($this->cart, count($this->cart), 5);

            return $this->response->paginator($carts, $cartTransformer);
        }

        return $this->response->item($this->cart, $cartTransformer);
    }
}
