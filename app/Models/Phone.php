<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

    ############################# Relations ###########################


    public function user(){

        return $this->belongsTo('App\Models\User','user_id');
    }

}
