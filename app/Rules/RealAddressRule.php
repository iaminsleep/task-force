<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Http\Services\YaGeoService;

class RealAddressRule implements Rule
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
        $service = new YaGeoService;
        return $service->validateAddress($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Введите настоящий адрес';
    }
}
