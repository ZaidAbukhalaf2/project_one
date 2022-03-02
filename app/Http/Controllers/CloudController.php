<?php

namespace App\Http\Controllers;
use App\Events\VideoViewer;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Video;

class CloudController extends Controller
{

    // use OfferTrait;

    

    public function __construct()
    {
    }

    public function getOffers()
    {

        return Offer::select('id', 'name')->get();
    }


    public function create()
    {
        return view('create.create');
    }

    public function store(OfferRequest $request)
    {


        $file_name = $this->saveimage($request->photo , 'images/offers');

        //insert 
        Offer::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'photo'=>$file_name,


        ]);



        return redirect()->back()->with(['success' => 'create is done']);
    }

    public function getAllOffer()
    {

        $offers = Offer::select(
            'id',
            'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )->get();

        return view('create.all', compact('offers'));
    }

    public function editOffer($offer_id)
    {

        // Offer::findOrFail($offer_id);

        $offer = Offer::find($offer_id); //search in given Table only
        if (!$offer)
            return  redirect()->back();

        $offer = Offer::select('id', 'name_ar', 'name_en', 'details_ar', 'details_en', 'price')->find($offer_id);

        return view('create.edit', compact('offer'));

        // return $offer_id;



    }

    public function deleteOffer($offer_id){

        //check if offer id exists

      $offer = Offer::find($offer_id);

      if(!$offer)

      return redirect()->back()->with(['error'=>'العرض غير موجود']);

       
      $offer->delete();

      return redirect()->route('create.delete',$offer_id)->with(['success']);
    }


    public function UpdateOffer(OfferRequest $request,$offer_id){

        //update data

        $offer = Offer::find($offer_id);
        if(!$offer)

        return redirect()->back();

        $offer->update($request->all());

        return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
        // $offer->update([

        //     'name_ar'=>$request->name_ar,
        // ]);

    }
    

    public function getvideo(){

      $video = Video::first();

      event(new VideoViewer($video));

        return view('youtube')->with('video',$video);

    }
}
