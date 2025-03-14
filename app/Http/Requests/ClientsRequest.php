<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
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
            'client_name' => 'required|string',
            'client_uic' => 'required|string|max:15',
            'client_vat' => 'nullable|string|max:17',
            'client_contact' => 'required|string',
            'email' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:10',
            'address' => 'required|string',
            'more_info' => 'nullable|string',
            'contractor_id' => 'required|integer',
            'objects' => 'required|array',
            'objects.*.object' => 'required|string',
            'objects.*.object_address' => 'nullable|string',
        ];
    }
}
