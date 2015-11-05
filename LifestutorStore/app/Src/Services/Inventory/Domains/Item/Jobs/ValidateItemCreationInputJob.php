<?php

namespace Services\Inventory\Domains\Item\Jobs;

use Illuminate\Http\Request;
use Foundation\AbstractJob;
use Services\Inventory\Domains\Item\Validators\ItemCreationValidator as Validator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class ValidateItemCreationInputJob extends AbstractJob
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
