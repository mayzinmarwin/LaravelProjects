<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{
    //
    public function index(){
        $userRoles = UserRole::orderBy('serial','ASC')->paginate(5);
        return view('admin.user_role.index',['userRoles'=> $userRoles]);
    }
    public function update(Request $request){
        $userRoles = UserRole::find($request->id);
        $userRoles->name = $request->name;
        $userRoles->serial = $request->serial;
        $userRoles->creater = Auth::user()->id;
        $userRoles->updated_at =  Carbon::now()->toDateTimeString();
        $userRoles->save();
        return redirect()->back()->with('success','data Updated');
    }
}
