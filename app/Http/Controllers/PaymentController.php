<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $payments =Payment::all();
        // $payments=Payment::with('product')->get();

        $payments=Payment::with(['product' => function ($query) {
            $query->with(['market' => function ($query) {
                $query->withTrashed();
            
            }])->withTrashed();
        
        }])->get();
        //  dd($payments);
        return response()->view('cms.payments.index',['payments'=>$payments]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $validator = Validator($request->all(), [
            'product_id' =>'required|numeric|exists:products,id',
            'price' => 'required',
        ]);

        if (!$validator->fails()) {
            $product = Product::find($request->product_id);
            if (!is_null($product)) {
                // if (!Payment::where('product_id', $product->id)->exists()) {
                    $payment = new Payment();
                    $payment->product_id= $request->product_id;
                    $payment->price= $request->price;
                    $payment->discount_price= $request->discount_price;
                    $payment->discount= $request->discount;
                    $isSaved = $payment->save();
                    if ($isSaved)
                    return response()->json(['message' => 'Product cart added']);
        
    }
        else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
