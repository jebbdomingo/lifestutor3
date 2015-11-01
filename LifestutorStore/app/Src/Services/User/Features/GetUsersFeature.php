<?php
namespace Services\User\Features;

use Foundation\AbstractFeature;
use Services\User\Domains\User\Jobs\GetUsersJob;
use Services\User\Domains\User\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of registering a user in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetUsersFeature extends AbstractFeature
{
	/**
	 * [handle description]
	 *
	 * @return response
	 */
    public function handle()
    {
        $user = $this->run(GetUsersJob::class);

        return $this->run(RespondWithJsonJob::class, ['user' => $user]);
    }
}
