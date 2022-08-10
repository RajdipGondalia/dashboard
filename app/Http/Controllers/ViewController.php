<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;


class ViewController extends Controller
{
    public function index(){
        $current_user = Auth::user()->name;
        return view('pages.dashboard')->with('current_user',$current_user);
    }

    public function view_all_employees(){
        $employees = Profile::where('isDelete', '=', 0)->get();   
        $current_user = Auth::user()->name;
        $total_employee = Profile::where('isDelete', '=', 0)->count();
        return view('pages.Employee.AllEmployees')->with(['employees'=>$employees,'current_user'=>$current_user,'total_employee'=>$total_employee]);
    }
    
}