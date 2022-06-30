<?php

namespace App\Http\Requests;

class AddressRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street' => 'required|string|max:255|min:3',
            'number' => 'required|string|max:255',
            'district' => 'required|string|max:255|min:3',
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }
}
