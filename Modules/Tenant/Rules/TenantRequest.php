<?php

namespace Modules\Tenant\Rules;

use Illuminate\Contracts\Validation\Rule;

class TenantRequest implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (is_array($value)) {
            foreach ($value as $element) {
                if (! is_string($element) || strlen($element) === 0) {
                    return false;
                }
            }

            return true;
        } elseif (is_string($value) && strlen($value) === 0) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This field is required.';
    }
}
