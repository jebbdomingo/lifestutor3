<?php

namespace Services\User\Domains\User\Jobs;

use Foundation\AbstractJob;
use Services\User\Data\Entities\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Services\User\Data\Repositories\UserRepository;
use Foundation\Assertion;

use Services\User\Data\Roles\Role;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetUserJob extends AbstractJob
{
    /**
     * [$id description]
     *
     * @var integer
     */
    private $id;

    /**
     * [__construct description]
     *
     * @param integer $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * [handle description]
     *
     * @param  UserRepository $repository
     *
     * @return User
     */
    public function handle(UserRepository $repository)
    {
        // Currently authenticated user
        //$user = app('Dingo\Api\Auth\Auth')->user();
        //$user->hasRoleByName('Member');
        //$user->hasRole($user->getRoles()->toArray());
        
        Assertion::currentUserIsAdmin('You have no permission to create an Item');

        $user = $repository->get($this->id);

        Assertion::entityExists($user, "User with ID '{$this->id}' not found");

        return $user;
    }
}
