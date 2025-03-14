<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['client_name', 'client_uic', 'client_vat', 'client_contact', 'email', 'phone_number', 'address', 'more_info', 'contractor_id', 'objects_id'];

    public function Contractors(){
        return $this -> belongsTo(Contractors::class, 'contractor_id', 'id');
    }

    public function Objects(){
        return $this -> belongsToMany(Objects::class, 'client_object', 'client_id', 'object_id');
    }
}