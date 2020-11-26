<?php

namespace App\Http\Requests\Activities;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivitiesRequest extends FormRequest
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
        return [
            'title' => 'required',
            'disciplines_id' => 'required',
            'description' => 'required',
            'delivery_date' => 'required',
        ];
    }
    /**
     * Message apply to the request rules.
     *
     * @return array
     */
    public function message()
    {
        return [
            'title.required' => 'You must specify an :atribute',
            'disciplines_id.required' => 'You must specify an :atribute',
            'description.required' => 'You must specify an :atribute',
            'delivery_date.required' => 'You must specify an :atribute',
        ];
    }

}
