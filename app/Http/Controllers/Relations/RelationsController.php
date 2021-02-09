<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Phone;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;

class RelationsController extends Controller
{


    public function hasOne(){

       /* $user = User::with(['phone'=>function($q){
            $q->select('code','phone','user_id');
        }])->find(1);

        return response()->json($user);



       $phone = Phone::find(1);

       return $phone->user;*/

         $user = User::with(['phone'=>function($q){
            $q->select('code','phone','user_id');
        }])->find(1);

        return $user->phone->code;
    }



    public function hasOneReverse(){

        $phone = Phone::find(2);

        //  Make Some Attributes Visible
        $phone->makeVisible(['user_id']);

        //  Make Some Attributes Hidden
        $phone->makeHidden(['id']);

        // Get All Data Of User Has This Number
        // return $phone->user;
        //return $phone;

        ## Return All Data phone with All data of User Of This Phone
        $phoneWithUser = Phone::with('user')->find(1);

        //return $phoneWithUser->user;

        ## Return All Data Of phone with All data of User Of This Phone
        $phoneWithUserAndQuery = Phone::with(['user'=> function($q){
            $q->select('id','name');
        } ])->find(2);

        return $phoneWithUserAndQuery;
    }


    public function getUserHasPhone(){
        return User::whereHas('phone',function ($q){

            $q->where('code','213');

        })->with('phone')->get();
    }

    public function getUserDoesntHavePhone(){
        return User::whereDoesntHave('phone')->get();
    }


    ########################### One To Many RelationShip Methods

    public function getAllHospitals(){

        $hospitals = Hospital::all();

        return view('relations.hospitals',['hospitals'=>$hospitals]);
    }

    public function getAllDoctorsOfHospital($id){


        $hospital = Hospital::find($id);

        return view('relations.doctorsOfHospital',[
            'hospitalName' => $hospital->name,
            'doctors'=>$hospital->doctors
        ]);
    }

    public function deleteHospital($id){

       $hospital =  Hospital::find($id);

        if(!$hospital)
            return abort('404');

        $hospital -> doctors() -> delete();
        $hospital -> delete();

        return redirect('all_Hospital');
    }


    public function getHospitalDoctors($id = 1){

        $hospital  = Hospital::with('doctors')->find($id);

        return $hospital->doctors ;
    }

    public function getHospitalDoctorsReverse($id = 1){

        $doctor = Doctor::with('hospital')->find(1);

        //$doctor->hospital->makeVisible(['created_at','updated_at']);
        return $doctor;
    }






    ##################################### MANY To MANAY

    public function mtmgetDoctorsServices(){


        $doctor  = Doctor::with('services')->find(2);

        $doctor->services->makeHidden(["pivot"]);

        $doctor->makeHidden(['id','hospital_id']);
        return $doctor;
    }


    public function mtmgetServicesDoctors(){


        $serviceWithDoctor  = Service::with('doctors')->find(2);

        $serviceWithDoctor->doctors->makeHidden(["pivot"]);

        //$serviceWithDoctor->makeHidden();
        return $serviceWithDoctor;
    }


    public function getDoctorServices($id){


        $doctorServices  = Doctor::with('services')->find($id);

        $doctorServices->services->makeHidden(["pivot"]);

        $doctorServices->makeHidden(['id','hospital_id']);

        $doctors = Doctor::select('id','name')->get();
        $services = Service::select('id','name')->get();


        return view('relations.doctorServices',compact("doctorServices","doctors","services"));
    }


    public function saveServicesToDoctor(Request $request){

        $doctor = Doctor::find($request->doctorId);

        $doctor->services()->attach($request->servicesIds);

        return redirect()->back();


    }


}
