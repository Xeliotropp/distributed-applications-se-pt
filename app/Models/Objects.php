<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{
    protected $fillable = ['object', 'object_address'];

    public function Clients(){
        return $this -> belongsToMany(Clients::class, 'client_object', 'object_id', 'client_id');
    }
}