<?php

namespace App\Http\Controllers;

use App\Models\Offer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CloudController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function getOffers(){

       return Offer::select('id','name')->get();

    }

    // public function store()
    // {
    //     Offer::create([
    //         'name'=>'offer2',
    //         'price'=>'200',
    //         'details'=>'new offer'

    //     ]);
    // }

    public function create()
    {
        return view('create.create');
    }

    public function store(Request $request)
    {

         //validate data before insert to database

         $rules = $this->getRules();
         $messages = $this->getmessage();
 
         $valedator = Validator::make($request->all(),$rules,$messages);
 
         if($valedator->fails()){
 
            return redirect()->back()->withErrors($valedator )->withInputs($request->all());
         }

        //insert 
        Offer::create([
            'name' => $request->name,
            'price'=>$request->price,
            'details'=>$request->details,

        ]);


         
        return redirect()->back()->with(['success'=>'create is done']);

        
        
    }

    public function getmessage(){

       return $messages=[
            'name.required' => __('messages.Offer name required'),
            'name.unique' => __('messages.Offer name must be unique'),
            'price.required' =>__('messages.Offer number required'),
           'price.numeric' => __('messages.Offer number numeric'),
           'details.required'=>__('messages.Offer details required')

        ];
    }

    public function getRules(){

        return  $rules=['name'=>'required | max:100 | unique:Offers,name',
        'price'=>'required | numeric',
        'details'=>'required'
             ];
     }
}
