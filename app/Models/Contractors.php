<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractors extends Model
{
    protected $fillable = [
        "contractor_name",
        "contractor_uic",
        "contractor_vat",
        "contractor_contact_person",
        "contractor_phone_number",
        "contractor_more_info",
        "commission_percentage",

    ];

    public function Clients(){
        return $this -> hasMany(Clients::class, 'contractor_id', 'id');
    }
}