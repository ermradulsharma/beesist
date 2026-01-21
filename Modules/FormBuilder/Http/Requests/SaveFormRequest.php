<?php

namespace Modules\FormBuilder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\FormBuilder\Entities\Form;

class SaveFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'visibility' => ['required', Rule::in([Form::FORM_PUBLIC, Form::FORM_PRIVATE])],
            'allows_edit' => 'required|boolean',
            'form_builder_json' => 'required|json',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
