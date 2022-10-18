<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){
        //dd($_SERVER);
        return view('admin.dashboard');
        
    }
    //blank page function
    public function bladeIndex()
    {
        return view('admin.blank.index');
    }
    public function bladeCreate()
    {
        return view('admin.blank.create');
    }
    public function bladeView()
    {
        return view('admin.blank.view');
    }
}
