<?php

namespace Services\User\Data\Repositories;

use Doctrine\ORM\EntityRepository;

class DoctrineRoleRepository extends EntityRepository implements RoleRepository
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
     * @param  User $role
     *
     * @return void
     */
    public function create($role)
    {
    	$this->getEntityManager()->persist($role);
    	$this->getEntityManager()->flush();
    }

    /**
     * [update description]
     *
     * @param  User $uroleser
     *
     * @return void
     */
    public function update($role)
    {}
}