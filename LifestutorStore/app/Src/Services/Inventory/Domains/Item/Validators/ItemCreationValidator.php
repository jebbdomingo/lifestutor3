<?php

namespace Services\Inventory\Domains\Item\Validators;

use Foundation\Validation;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class ItemCreationValidator extends Validation
{
	/**
	 * [$rules description]
	 *
	 * @var array
	 */
    protected $rules = [
        'title'    => 'required',
        'price'    => 'numeric|between:1,9000000',
        'quantity' => 'integer|between:1,1000',
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
        	throw new StoreResourceFailedException('Could not create new item.', $validator->errors());
        }

        return true;
    }
}
