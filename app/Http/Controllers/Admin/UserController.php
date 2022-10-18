<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\UserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    //
    public function index(){
        // $users = User::latest()->paginate(10);
        $users = User::active()->with(['role'])->paginate(5);
        //dd($users);
        //return $users;
        return view('admin.user.index',['users'=> $users]);
    }
    public function view($id){
       
        //$users = User::where('id',$id->first());
        $users = User::find($id);
        //dd($users);
        return view('admin.user.view',compact('users'));
    }
    public function create(){
        $user_roles=UserRole::orderBy('serial','DESC')->get();
        return view('admin.user.create',compact('user_roles'));
    }
    public function edit($id){
       // dd($id);
        $user_roles=UserRole::orderBy('serial','DESC')->get();
        $users = User::find($id);
        return view('admin.user.edit',compact('user_roles','users'));
    }
    public function store(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'first_name'=> ['required'],
            'last_name' => ['required'],
            'username'  => ['required'],
            'email'     => ['required'],
            'phone'  => ['required'],
            'password'  => ['required'],
            'image'  => ['required'],
            'password'=> ['required','string','min:8','confirmed'],

        ]);
       //=dd($request->all());
        $user = new User();
        $user->first_name= $request->first_name;
        $user->last_name= $request->last_name;
        $user->username= $request->username;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->password= Hash::make($request->password);
        $user->created_at = Carbon::now()->toDayDateTimeString();
        $user->creater = Auth::user()->id;
        $user->save();
        $user->slug = $user->id.uniqid(10);
        $user->save();
        // if($request->hasFile('image')){
        //     $user->photo = Storage::put('uploads/user',$request->file('image') );
        //     $user->save();
        // }
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads/user'), $filename);
            $user['photo']= $filename;
            $user->save();
        }
        $user->save();
        //return view('admin.user.view',compact('users'));
        //dd($request)->all;
        return redirect()->route('admin.user.view',$user->id);
    }
    public function update(Request $request){
        //return $request->all();
        $this->validate($request,[
            'first_name'=> ['required'],
            'last_name' => ['required'],
            'old_password'=>['required'],
            'email'     => ['required'],
            // 'username'  => ['required'],
            // 'email'     => ['required'],
            // 'phone'  => ['required'],
            // 'image'  => ['required'],
            // 'password'=> ['required','string','min:8','confirmed'],
             //'password'=> ['required'],

        ]);
        $user = User::find($request->id);
        if($user->username !=$request->username){
            $this->validate($request,[
                'username'     => ['required','unique:users'],
            ]);
            $user->username= $request->username;
        }
        if($user->phone !=$request->phone){
            $this->validate($request,[
                'phone'     => ['required','unique:users'],
            ]);
            $user->phone= $request->phone;
        }
        if(!is_null($request->old_password) && !is_null($request->password)  && !is_null($request->password_confirmation)){
            $this->validate($request,[
                'password' => ['string','min:8','confirmed'],
            ]);
            if(Hash::check($request->old_password,$user->password)){
                $user->password= Hash::make($request->password);
                
            }else{
                if($request->ajax()){
                    $validator = Validator::make([], []);
                    return $validator->getMessageBag()->add('old_password', 'old password wrong');
                }
                return redirect()->back()->with('old_password','old password wrong');
            }
        }
        $user->first_name= $request->first_name;
        $user->last_name= $request->last_name;;
        $user->updated_at = Carbon::now()->toDayDateTimeString();
        $user->creater = Auth::user()->id;
        $user->save();
        if($request->hasfile('image')){
            if(!file_exists(public_path().'/uploads/user/'. $user['photo'])){
                unlink(public_path().'/uploads/user/'. $user['photo']);
            }
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads/user'), $filename);
            $user['photo']= $filename;
            $user->save();
        }
        // $user->save();
        return redirect()->route('admin.user.index',$user->id)->with('success','Data Updated');
        //return $user;
    }
    public function delete(Request $request){
        $user = User::find($request->id);
        $user->status =0;
        $user->creater = Auth::User()->id;
        $user->save();
        return redirect()->back()->with('success','Data Deleted');
    }
    public function test($id){
        return 'we got your id '.$id;
    }
}
