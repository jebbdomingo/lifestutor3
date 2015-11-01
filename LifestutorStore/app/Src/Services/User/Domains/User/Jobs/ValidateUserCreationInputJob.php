<?php

namespace Services\User\Domains\User\Jobs;

use Illuminate\Http\Request;
use Foundation\AbstractJob;
use Services\User\Domains\User\Validators\UserCreationValidator as Validator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class ValidateUserCreationInputJob extends AbstractJob
{
	/**
	 * [handle description]
	 *
	 * @param  Validator $validator
	 * @param  Request   $request
	 *
	 * @return boolean
	 */
    public function handle(Validator $validator, Request $request)
    {
        return $validator->validate($request->all());
    }
}
