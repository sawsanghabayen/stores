<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class HomeController extends Controller
{

    public function index()
    {
        $admins_count =Admin::count();
      
        return view('cms.home.dashboard')->with(compact('admins_count'));
    }

}
