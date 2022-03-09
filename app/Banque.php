<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
    public function clients(){
        return $this->belongsToMany(Client::class);
    }

    public function accounts(){
        return $this->hasMany(Compte::class);
    }
}
