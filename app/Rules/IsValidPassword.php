<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class IsValidPassword implements Rule
{
    /**
     * Determine if the Uppercase Validation Rule passes.
     *
     * @var boolean
     */
    public $uppercasePasses = true;

    /**
     * Determine if the Numeric Validation Rule passes.
     *
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Determine if the Special Character Validation Rule passes.
     *
     * @var boolean
     */
    public $specialCharacterPasses = true;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->uppercasePasses = ((bool) preg_match('/(?=.*[a-z])(?=.*[A-Z])/', $value));
        $this->numericPasses = ((bool) preg_match('/[0-9]/', $value));
        $this->specialCharacterPasses = ((bool) preg_match('/[^A-Za-z0-9]/', $value));

        return ($this->uppercasePasses && $this->numericPasses && $this->specialCharacterPasses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case !$this->uppercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                // return 'The :attribute must contain at least one uppercase character.';
                return __('validation.password.mixed');

            case !$this->numericPasses
                && $this->uppercasePasses
                && $this->specialCharacterPasses:
                return __('validation.password.numbers');

            case !$this->specialCharacterPasses
                && $this->uppercasePasses
                && $this->numericPasses:
                return __('validation.password.symbols');

            case !$this->uppercasePasses
                && !$this->numericPasses
                && $this->specialCharacterPasses:
                return __('validation.password.mixedNumbers');

            case !$this->uppercasePasses
                && !$this->specialCharacterPasses
                && $this->numericPasses:
                return __('validation.password.mixedSymbols');

            case $this->uppercasePasses
                && !$this->specialCharacterPasses
                && !$this->numericPasses:
                return __('validation.password.numbersSymbols');

            case !$this->uppercasePasses
                && !$this->numericPasses
                && !$this->specialCharacterPasses:
                return __('validation.password.all');
            default:
                return __('validation.password.invalid');
        }
    }
}
