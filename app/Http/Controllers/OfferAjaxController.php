<?php

namespace App\Http\Controllers;

use App\Http\Requests\offers\CreateOfferval;
use App\Models\Offer;
use App\Traits\FunctionTraits;
use Illuminate\Http\Request;

class OfferAjaxController extends Controller
{
    use FunctionTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::select('id', 'name', 'price', 'details', 'photo')/*->where('lang',LaravelLocalization::getCurrentLocale()) */ ->orderBy('id', 'asc')->get();
        //  die($offers);
        return view('ajaxOffers.all', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajaxOffers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOfferval $request)
    {
        //Save offers into DataBase using AJAX


        $offer = Offer::create([
            'photo' => $this->saveImage($request->file('photo'), 'images/offers'),
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
            //'lang'=> LaravelLocalization::getCurrentLocale(),

        ]);


        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => "Offer added successfully",
                'offer' => $offer
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => "An error occurred while saving offer",
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $offer = Offer::find($id);
        return view('ajaxOffers.edit', compact('offer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $offer = Offer::find($request->id);

        $offer->photo = $this->saveImage($request->file('photo'), 'images/offers');
        $offer->name = $request->name;
        $offer->price = $request->price;
        $offer->details = $request->details;

        $offer->save();

        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => "Offer added successfully"
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $offer = Offer::find($request->id);

        $offer->delete();

        return response()->json([
            'status' => true,
            'msg' => "Offer Deleted successfully"
        ]);
    }
}
