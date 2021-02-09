<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{


    protected $fillable =['name','price','details','lang', 'photo'];

    protected $hidden=['created_at','updated_at'];

    //This line prevent Laravel to insert filed Created_at and Inserted_at with Storage row
    public $timestamps = false;

/*
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    public function setUpdatedAt($value)
    {
        // Do nothing.
    }
    public function setCreatedAt($value)
    {
        // Do nothing.
    }
*/
}
