<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractorsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contractor_name'=> 'required|string',
            'contractor_uic' => 'required|string|max:15',
            'contractor_vat'=> 'nullable|string|max:17',
            'contractor_contact_person' => 'required|string',
            'contractor_phone_number' => 'required|string|max:10',
            'contractor_more_info' => 'nullable|string',
            'commission_percentage' => 'required|integer'
        ];
    }

}
