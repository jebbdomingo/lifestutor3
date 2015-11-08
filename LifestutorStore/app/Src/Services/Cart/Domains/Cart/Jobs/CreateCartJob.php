<?php

namespace Services\Cart\Domains\Cart\Jobs;

use Foundation\AbstractJob;
use Services\User\Data\Entities\User\User;
use Services\Cart\Data\Entities\Cart\Cart;
use Services\Cart\Data\Repositories\CartRepository;
use Services\User\Data\Repositories\UserRepository;

/**
 * A Domain Service which coordinates how the Car is created in the application
 * 
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class CreateCartJob extends AbstractJob
{
    /**
     * [$user_id description]
     *
     * @var User ID
     */
    private $user_id;

    /**
     * [__construct description]
     *
     * @param integer $user_id
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * [handle description]
     *
     * @param  CartRepository $repository
     *
     * @return Cart
     */
    public function handle(CartRepository $repository, UserRepository $userRepository)
    {
        $user = $userRepository->find($this->user_id);
        $cart = new Cart($user);

        $repository->create($cart);

        return $cart;
    }
}
