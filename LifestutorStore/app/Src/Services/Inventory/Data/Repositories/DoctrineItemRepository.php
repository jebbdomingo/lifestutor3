<?php

namespace Services\Inventory\Data\Repositories;

use Doctrine\ORM\EntityRepository;

class DoctrineItemRepository extends EntityRepository implements ItemRepository
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
     * @return User
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
     * @param  User $item
     *
     * @return void
     */
    public function create($item)
    {
    	$this->getEntityManager()->persist($item);
    	$this->getEntityManager()->flush();
    }

    /**
     * [update description]
     *
     * @param  User $item
     *
     * @return void
     */
    public function update($item)
    {}
}