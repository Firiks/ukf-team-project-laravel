<?php

namespace App\Http\Requests;

class UpdateEventRequest extends CreateEventRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

        $rules['image'] = 'file|image';

        return $rules;
    }
}
