<?php

namespace App\Repositories\Traits;

use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\ValidationException;

trait Validator
{
    /**
     * @param $attributes
     * @param $rules
     * @return mixed
     */
    public function validate($attributes, $rules)
    {
        return ValidatorFacade::make($attributes, $rules);
    }

    public function throwValidationException($validator, $message)
    {
        throw new ValidationException($validator, response()->json(compact('message')));
    }
}
