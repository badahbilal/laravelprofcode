<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = "hospitals";

    protected $fillable =['id','name','address','created_at','updated_at'];

    protected $hidden=['created_at','updated_at'];

    //This line prevent Laravel to insert filed Created_at and Inserted_at with Storage row
    //public $timestamps = false;




    ##################################################### Relation

    public function doctors(){

        //return $this->hasMany(Doctor::class);

        return $this->hasMany('App\Models\Doctor','hospital_id');

    }
}
