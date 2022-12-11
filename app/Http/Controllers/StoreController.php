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
        // $name=$request->query('name');
        // $products_count=Market::withCount('products')->get();
        // dd($products_count);
        $products=Product::all();
        $markets=Market::withCount('products')->get();
    
        return response()->view('front.index',['products'=>$products,'markets'=>$markets]);
    }

    
}
