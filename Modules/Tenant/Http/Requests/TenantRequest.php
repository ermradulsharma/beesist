<?php

namespace Modules\Tenant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    protected $json_fields = ['form_k_notice', 'property_address', 'adult_fullnames', 'minor_fullnames', 'rental_period', 'security'];
    // protected $json_fields = ['form_k_notice', 'property_address', 'adult_fullnames', 'minor_fullnames', 'rental_period', 'security'];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        foreach ($this->json_fields as $field) {
            $rules[$field] = 'required';
        }

        return $rules;
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'This field is required.',
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
