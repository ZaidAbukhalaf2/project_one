<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table ="Offers";
    protected $fillable = ['name_ar','name_en','price','details_ar','details_en','created_at','updated_at','photo'];
    protected $hidden = ['Created_at','Updated_at'];
    // public $timestamps = false;
}
 