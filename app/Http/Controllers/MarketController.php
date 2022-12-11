<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $markets=Market::withCount('products')->get();

        if (Auth::guard('admin')->check()){

            return response()->view('cms.markets.index',['markets'=>$markets]); 
        }
        else{
           
         
            return response()->view('front.markets', ['markets'=>$markets ]);
        }
        
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.markets.create');   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:2',
            'address'=> 'required | string|min:2',
            'logo' => 'required|image|mimes:png,jpg,jpeg',
 
          
        ]);
 
        if (!$validator->fails()) {
         
            $market = new Market();
            $market->name = $request->input('name');
            $market->address = $request->input('address');
 
            
            if ($request->hasFile('logo')) {
             
                $file = $request->file('logo');
                $imagetitle =  time().'_market_logo.' . $file->getClientOriginalExtension();
                $status = $request->file('logo')->storePubliclyAs('logos/markets', $imagetitle);
                $imagePath = 'logos/markets/' . $imagetitle;
                $market->logo = $imagePath;
            }
 
 
          
                $isSaved = $market->save();

       
 
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        return response()->view('cms.markets.edit',['market'=>$market]);   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:2',
            'address'=> 'required | string|min:2',
            'logo' => 'image|mimes:png,jpg,jpeg',
 
          
        ]);
 
        if (!$validator->fails()) {
         
            $market->name = $request->input('name');
            $market->address = $request->input('address');
 
            
            if ($request->hasFile('logo')) {
                Storage::delete($market->logo);
                $file = $request->file('logo');
                $imagetitle =  time().'_market_logo.' . $file->getClientOriginalExtension();
                $status = $request->file('logo')->storePubliclyAs('logos/markets', $imagetitle);
                $imagePath = 'logos/markets/' . $imagetitle;
                $market->logo = $imagePath;
            }
 
 
          
                $isSaved = $market->save();

       
 
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        $isDeleted = $market->delete();
        if ($isDeleted) {
            Storage::delete($market->logo);

        }
        return response()->json(
            [
                'title' => $isDeleted ? 'Deleted!' : 'Delete Failed!',
                'text' => $isDeleted ? 'Market deleted successfully' : 'Market deleting failed!',
                'icon' => $isDeleted ? 'success' : 'error'
            ],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }
    }

