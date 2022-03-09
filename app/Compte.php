<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function banque(){
        return $this->belongsTo(Banque::class);
    }
}
