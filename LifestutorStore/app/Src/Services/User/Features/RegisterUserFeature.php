<?php
namespace Services\User\Features;

use Illuminate\Http\Request;
use Foundation\AbstractFeature;
use Services\User\Domains\User\Jobs\ValidateUserCreationInputJob;
use Services\User\Domains\User\Jobs\RegisterUserJob;
use Services\User\Domains\User\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of registering a user in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RegisterUserFeature extends AbstractFeature
{
	/**
	 * [handle description]
	 *
	 * @param  Request $request
	 *
	 * @return response
	 */
    public function handle(Request $request)
    {
        $input = $request->input();

        $this->run(ValidateUserCreationInputJob::class);

        $user = $this->run(RegisterUserJob::class, $request);

        return $this->run(RespondWithJsonJob::class, ['user' => $user]);
    }
}
