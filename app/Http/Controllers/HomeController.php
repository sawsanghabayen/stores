<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Payment;

class HomeController extends Controller
{

    public function index()
    {
        $admins_count =Admin::count();
        $purchases_count =Payment::count();
      
        return view('cms.home.dashboard')->with(compact('admins_count' ,'purchases_count'));
    }

}
