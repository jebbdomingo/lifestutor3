<?php

namespace Services\User\Domains\User\Jobs;

use Foundation\AbstractJob;
use Services\User\Data\Entities\User;
use EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetUsersJob extends AbstractJob
{
    /**
     * [handle description]
     *
     * @param  EntityManager $em
     *
     * @return User
     */
    public function handle(EntityManager $em)
    {
        return $em::getRepository('Services\User\Data\Entities\User\User')->findAll();
    }
}
