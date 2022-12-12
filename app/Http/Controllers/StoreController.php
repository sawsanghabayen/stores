<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $products=Product::withoutTrashed()->when($request->name ,function($query ,$value){
            $query->where('name' ,'LIKE',"%$value%");
        })->get();

        $markets=Market::withoutTrashed()->withCount('products')->get();
    
        return response()->view('front.index',['products'=>$products,'markets'=>$markets]);
    }

    
}
