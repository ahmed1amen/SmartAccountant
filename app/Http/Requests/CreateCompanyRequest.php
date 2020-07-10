<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Company;

class CreateCompanyRequest extends FormRequest
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
        return Company::$rules;
    }
    public function attributes()
    {
        return [
            "PhoneNumber"   =>  __("employee.phone"),
            "Name"   =>  __("employee.name"),
            "Address"   =>  __("branch.address"),
            "Country"   =>  __("branch.country"),
        ];
    }
}
