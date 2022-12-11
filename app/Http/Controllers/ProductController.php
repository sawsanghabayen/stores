<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products=product::all();


        if (Auth::guard('admin')->check()){

            return response()->view('cms.products.index',['products'=>$products]); 
        }
        else{
            if($request->has('id')){
                $products =Product::where('market_id','=',$request->input('id'))->get();
            }
            
         
            return response()->view('front.products', ['products'=>$products]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $markets=Market::all();
        return response()->view('cms.products.create',['markets'=>$markets]);   

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
            'market_id' => 'required|numeric|exists:markets,id',
            'name' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'price' => 'required|numeric|min:1',
            'discount_price' => 'required|numeric|min:0',
            'discount' => 'required|boolean',
            'image' => 'required|image|mimes:png,jpg,jpeg',
 
          
        ]);
 
        if (!$validator->fails()) {
         
            $product = new Product();
            $product->name = $request->input('name');
            $product->market_id = $request->input('market_id');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->discount_price = $request->input('discount_price');
            $product->discount = $request->input('discount');
            if ($request->hasFile('image')) {
             
                $file = $request->file('image');
                $imagetitle =  time().'_product_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/products', $imagetitle);
                $imagePath = 'images/products/' . $imagetitle;
                $product->image = $imagePath;
            }
 
 
          
                $isSaved = $product->save();

       
 
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $markets=Market::all();

        return response()->view('cms.products.edit',['product'=>$product ,'markets'=>$markets]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'price' => 'required|numeric|min:1',
            'discount_price' => 'nullable|numeric|min:1',
            'discount' => 'required|boolean',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
 
          
        ]);
 
        if (!$validator->fails()) {
         
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->discount_price = $request->input('discount_price');
            $product->discount = $request->input('discount');
            if ($request->hasFile('image')) {
                
                Storage::delete($product->image);
             
                $file = $request->file('image');
                $imagetitle =  time().'_product_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/products', $imagetitle);
                $imagePath = 'images/products/' . $imagetitle;
                $product->image = $imagePath;
            }
 
 
          
                $isSaved = $product->save();

       
 
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $isDeleted = $product->delete();
        if ($isDeleted) {
            Storage::delete($product->image);

        }
        return response()->json(
            [
                'title' => $isDeleted ? 'Deleted!' : 'Delete Failed!',
                'text' => $isDeleted ? 'Product deleted successfully' : 'Product deleting failed!',
                'icon' => $isDeleted ? 'success' : 'error'
            ],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }
    }

