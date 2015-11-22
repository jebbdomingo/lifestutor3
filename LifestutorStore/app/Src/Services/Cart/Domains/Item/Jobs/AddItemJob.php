<?php

namespace Services\Cart\Domains\Item\Jobs;

use Foundation\AbstractJob;
use Services\Cart\Data\Entities\Cart\Cart;
use Services\Cart\Data\Repositories\CartRepository;
use Services\Inventory\Data\Repositories\ItemRepository as InventoryItemRepository;
use Foundation\Assertion;

/**
 * A Domain Service which coordinates how the Car is created in the application
 * 
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class AddItemJob extends AbstractJob
{
    /**
     * [$item_id description]
     *
     * @var Item ID
     */
    private $item_id;

    /**
     * [$quantity description]
     *
     * @var Quantity
     */
    private $quantity;

    /**
     * [$cart_id description]
     *
     * @var Cart ID
     */
    private $cart_id;

    /**
     * [__construct description]
     *
     * @param integer $item_id
     */
    public function __construct($cart_id, $item_id, $quantity)
    {
        $this->cart_id  = $cart_id;
        $this->item_id  = $item_id;
        $this->quantity = $quantity;
    }

    /**
     * [handle description]
     *
     * @param  CartRepository $repository
     *
     * @return Cart
     */
    public function handle(CartRepository $repository, InventoryItemRepository $itemRepository)
    {
        $inventoryItem = $itemRepository->get($this->item_id);
        $cart          = $repository->get($this->cart_id);

        Assertion::notNull($cart, 'Invalid shopping cart');
        Assertion::notNull($inventoryItem, 'Invalid item to purchase');
        
        $item          = $cart->addItem($inventoryItem, $this->quantity);

        $repository->update($cart);

        return $item;
    }
}
