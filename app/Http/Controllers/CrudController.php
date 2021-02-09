<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\offers\CreateOfferval;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\FunctionTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    use FunctionTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }

    public function getOffers()
    {
        return Offer::get();
    }


    /* public function store(){
         die(Offer::create([

             'name'=>"offers 4",
             'price'=> "5000",
             'details'=> 'This field just a description'
         ]));
     }*/

    public function create()
    {
        return view('offers.create');
    }


    public function store(CreateOfferval $request)
    {
        //validate data befare insert to database
       /* $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required|'
        ];

        $messages = [
            'name.required' => __("messages.nameOfferRequire"),
            'name.unique' => __("messages.nameOfferUnique"),
            'price.numeric' => __("messages.priceOfferNumber"),

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            //return var_dump($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }*/
        //Insert
    //die(LaravelLocalization::getCurrentLocale());


        /*testo*/
        //save photo in folder




        Offer::create([
            'photo'=> $this->saveImage($request->photo, 'images/offers'),
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
            //'lang'=> LaravelLocalization::getCurrentLocale(),

        ]);

        return redirect()->back()->with(["success"=> __('messages.offerAdded')]);

    }


    public function getAllOfers(){

        $offers = Offer::select('id','name','price','details','photo')/*->where('lang',LaravelLocalization::getCurrentLocale()) */->get();
     //  die($offers);
        return view('offers.all', compact('offers'));
    }


    public function editOffer($id){
        //Offer::findOrFail($id);


        $offer = Offer::find($id);

        if(!$offer){
            return redirect()->back();
        }

        return view('offers.edit',compact('offer'));
        return $id;
    }

    public function updateOffer(CreateOfferval $request){

        $offer = Offer::find($request->id);

        $offer->name = $request->name;
        $offer->price = $request->price;
        $offer->details = $request->details;

        $offer->save();

        return redirect()->back()->with(["success"=> 'offer updated successfully']);

    }

    public function getVideo(){



        $video = Video::first();
        event(new VideoViewer($video));
        return view('youtube')->with('video',$video);
    }



    public function deleteOffer($id){

       $offer = Offer::find($id);

        if(!$offer){
            return redirect()->back()->with(["messageAction"=>'Offer not exist']);
        }


        $offer->delete();

        return redirect()->route('offers.all')->with(["messageAction"=>"offer deleted successfully"]);
    }

}
