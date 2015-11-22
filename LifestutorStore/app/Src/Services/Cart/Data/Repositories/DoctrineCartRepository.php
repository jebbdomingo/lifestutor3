<?php

namespace Services\Cart\Data\Repositories;

use Doctrine\ORM\EntityRepository;

class DoctrineCartRepository extends EntityRepository implements CartRepository
{
    public function get($id)
    {
        return $this->find($id);
    }

    /**
     * [getBy description]
     *
     * @param  string $title
     *
     * @return Cart
     */
    public function getBy($title)
    {}

    /**
     * [all description]
     *
     * @return array
     */
    public function all()
    {
        return $this->findAll();
    }

    /**
     * [create description]
     *
     * @param  Cart $cart
     *
     * @return void
     */
    public function create($cart)
    {
        $this->getEntityManager()->persist($cart);
        $this->getEntityManager()->flush();
    }

    /**
     * [update description]
     *
     * @param  Cart $cart
     *
     * @return void
     */
    public function update($cart)
    {
        $this->getEntityManager()->persist($cart);
        $this->getEntityManager()->flush();
    }
}