<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'=>'required | max:100 | unique:Offers,name_ar',
            'name_en'=>'required | max:100 | unique:Offers,name_en',
                'price'=>'required | numeric',
                'details_ar'=>'required',
                'details_en'=>'required'

        ];
    }
        public function messages(){

       return [
            'name_ar.required' => __('messages.Offer name required'),
            'name_en.required' => __('messages.Offer name required'),
            'name_ar.unique' => __('messages.Offer name must be unique'),
            'name_en.unique' => __('messages.Offer name must be unique'),
            'price.required' =>__('messages.Offer number required'),
           'price.numeric' => __('messages.Offer number numeric'),
           'details_ar.required'=>__('messages.Offer details required'),
           'details_en.required'=>__('messages.Offer details required')

        ];
    }
}
