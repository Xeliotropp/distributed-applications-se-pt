<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class Tasks extends Model
{
    protected $fillable = [
        'date_of_measurement',
        "mk", "mkcold", "osv", "osvEvak", "sh", "shobSgr", "shokolSr", 
        "vent", "klim", "f0", "z", "m", "izol", "dtz",

        'way_of_showing_documentation',
        'certificate_number',
        'certificate_date',
        'courrier_details',

        'date_of_next_measurement',
        
        "mk_next", "mkcold_next", "osv_next", "osvEvak_next",
        "sh_next", "shobSgr_next", "shokolSr_next", "vent_next", "klim_next",
        "f0_next", "z_next", "m_next", "izol_next", "dtz_next",

        'invoice',
        'invoice_date',
        'price_no_vat',

        'paid',
        'payment_method',

        'contractor',
        'contractor_sum',
        'total_sum',
        
        'client_id'
    ];

    public function Client(){
        return $this -> belongsTo(Clients::class, 'client_id', 'id');
    }
}