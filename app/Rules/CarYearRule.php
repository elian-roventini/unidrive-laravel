<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CarYearRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        private $firstYear = 2000,
        private $lastYear = null
    )
    {
        $this->lastYear = $lastYear ?? now()->format('Y') + 3;
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
        return $value >= $this->firstYear && $value <= $this->lastYear;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Deve ser um ano entre $this->firstYear e $this->lastYear.";
    }
}
