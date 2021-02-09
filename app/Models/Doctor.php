<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctors";

    protected $fillable =['id','name','title','hospital_id','created_at','updated_at'];

    protected $hidden=['created_at','updated_at'];

    //This line prevent Laravel to insert filed Created_at and Inserted_at with Storage row
    //public $timestamps = false;



    ##################################################### Relation


    public function hospital(){

        //return $this->hasMany(Doctor::class);

        return $this->belongsTo('App\Models\Hospital','hospital_id');

    }


    public function services(){

        return $this->belongsToMany('App\Models\Service','doctor_service',
                                    'doctor_id','service_id',
                                    'id','id');
    }




}
