<?php

namespace Services\User\Domains\User\Jobs;

use Illuminate\Pagination\LengthAwarePaginator;
use Foundation\AbstractJob;
use Services\User\Resources\Views\Transformers\UserTransformer;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RespondWithJsonJob extends AbstractJob
{
    /**
     * @var User
     */
    private $user;

    /**
     * [__construct description]
     *
     * @param mixed $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * [handle description]
     *
     * @param  UserTransformer $userTransformer
     *
     * @return array]
     */
    public function handle(UserTransformer $userTransformer)
    {
        if (is_array($this->user)) {
            $users = new LengthAwarePaginator($this->user, count($this->user), 5);

            return $this->response->paginator($users, $userTransformer);
        }

        return $this->response->item($this->user, $userTransformer);
    }
}
