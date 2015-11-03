<?php

namespace Services\User\Data\Repositories;

use Doctrine\ORM\EntityRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepository
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
     * @param  User $user
     *
     * @return void
     */
    public function create($user)
    {
    	$this->getEntityManager()->persist($user);
    	$this->getEntityManager()->flush();
    }

    /**
     * [update description]
     *
     * @param  User $user
     *
     * @return void
     */
    public function update($user)
    {}
}