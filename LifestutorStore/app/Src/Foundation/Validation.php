<?php

namespace Foundation;

use Validator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class Validation
{
    /**
     * [$rules description]
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Validate the given input.
     *
     * @param array $input
     * @param array $rules
     *
     * @return bool
     *
     * @throws Exception
     */
    protected function validate($input, array $rules = [])
    {
        return $this->make($input, $rules);
    }

    /**
     * Get a validation instance out of the given input and optionatlly rules
     * by default the $rules property will be used.
     *
     * @param array $input
     * @param array $rules
     *
     * @return \Illuminate\Validation\Validator
     */
    private function make($input, array $rules = [])
    {
        if (empty($rules)) {
            $rules = $this->rules;
        }

        return Validator::make($input, $rules);
    }
}
