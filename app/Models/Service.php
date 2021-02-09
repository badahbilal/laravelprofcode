<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =['id','name','created_at','updated_at'];

    protected $hidden=['created_at','updated_at'];

    //This line prevent Laravel to insert filed Created_at and Inserted_at with Storage row
    public $timestamps = true;



    public function doctors(){

        return $this->belongsToMany('App\Models\Doctor','doctor_service',
                                    'service_id','doctor_id',
                                    'id','id');
    }
}
