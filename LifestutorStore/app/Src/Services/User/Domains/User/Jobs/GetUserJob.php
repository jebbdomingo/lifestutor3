<?php

namespace Services\User\Domains\User\Jobs;

use Foundation\AbstractJob;
use Services\User\Data\Entities\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Services\User\Domains\User\Repositories\UserRepository;

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
        //$user = $em::getRepository('Services\User\Data\Entities\User\User')->find($this->id);
        $user = $repository->get($this->id);

        if (empty($user)) {
            return $this->response->errorNotFound("User with ID '{$this->id}'' not found");
        }

        return $user;
    }
}
