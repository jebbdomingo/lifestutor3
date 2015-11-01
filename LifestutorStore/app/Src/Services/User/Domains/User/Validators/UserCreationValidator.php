<?php

namespace Services\User\Domains\User\Validators;

use Foundation\Validation;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class UserCreationValidator extends Validation
{
	/**
	 * [$rules description]
	 *
	 * @var array
	 */
    protected $rules = [
        'firstname' => 'required',
        'lastname'  => 'required',
        'email'     => 'required|email',
    ];

    /**
     * [validate description]
     *
     * @param  object $input
     * @param  array  $rules
     *
     * @throws StoreResourceFailedException
     *
     * @return boolean
     */
    public function validate($input, array $rules = [])
    {
        $validator = parent::validate($input, $rules);

        if ($validator->fails()) {
        	throw new StoreResourceFailedException('Could not create new user.', $validator->errors());
        }

        return true;
    }
}
