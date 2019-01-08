<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    
    public function tableView()
    {
        $user = Auth::user();
        return view('admin.tableView',compact('user'));
    }

    public function admin()
    {
        return view('admin.admin');
    }
   

  
}
