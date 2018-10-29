<?php

namespace Techouse\TotalRecords;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

class IsSubclassOfModel implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return is_subclass_of($value, Model::class);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The class is not a child class of ' . Model::class . '!');
    }
}
