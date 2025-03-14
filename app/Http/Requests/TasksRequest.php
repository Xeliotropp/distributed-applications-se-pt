<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksRequest extends FormRequest
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
        'date_of_measurement' => 'nullable|date',
        
        "mk" => 'nullable',
        "mkcold" => 'nullable',
        "osv" => 'nullable',
        "osvEvak" => 'nullable',
        "sh" => 'nullable',
        "shobSgr" => 'nullable',
        "shokolSr" => 'nullable',
        "vent" => 'nullable',
        "klim" => 'nullable',
        "f0" => 'nullable',
        "z" => 'nullable',
        "m" => 'nullable',
        "izol" => 'nullable',
        "dtz" => 'nullable',

        'way_of_showing_documentation' => 'nullable|string',
        'certificate_number' => 'nullable|string',
        'certificate_date' => 'nullable|date',
        'courrier_details' => 'nullable|string',

        'date_of_next_measurement' => 'nullable|date',
        
        "mk_next" => 'nullable',
        "mkcold_next" => 'nullable',
        "osv_next" => 'nullable',
        "osvEvak_next" => 'nullable',
        "sh_next" => 'nullable',
        "shobSgr_next" => 'nullable',
        "shokolSr_next" => 'nullable',
        "vent_next" => 'nullable',
        "klim_next" => 'nullable',
        "f0_next" => 'nullable',
        "z_next" => 'nullable',
        "m_next" => 'nullable',
        "izol_next" => 'nullable',
        "dtz_next" => 'nullable',

        'invoice' => 'nullable|string',
        'invoice_date' => 'nullable|date',
        'price_no_vat' => 'nullable|integer',

        'paid' => 'nullable',
        'payment_method' => 'nullable|string',

        'contractor' => 'nullable|string',
        'contractor_sum' => 'nullable|numeric',
        'total_sum' => 'nullable|numeric',
        
        'client_id' => 'required|integer' 
        ];
    }

}
