<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function banques(){
        return $this->belongsToMany(Banque::class);
    }
}
