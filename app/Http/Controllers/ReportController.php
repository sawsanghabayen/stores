<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index()
    {
        $reports = DB::table('payments')->join('products' ,'payments.product_id' ,'products.id')
        ->select(  'products.name', DB::raw('SUM(payments.discount_price) as total')  )
        ->groupBy('product_id')
        ->get();
        
        // Payment::with(['product' => function ($query) {
        //         $query->sum('discount_price');
        //     }])->get();
       
    //    dd($products_price);
      
        return response()->view('cms.reports.index',['reports'=>$reports]); 

    }

}
