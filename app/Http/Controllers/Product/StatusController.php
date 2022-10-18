<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::where('status',1)->latest()->paginate(10);
        return view('admin.product.status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statuses = Status::create($request->all());
        $statuses->slug =Str::slug($statuses->name);
        $statuses->creater = Auth::user()->id;
        $statuses->save();
        //dd($request);
        //return redirect()->route('status.index')->with('success','Status created successful');
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('admin.product.status.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $statuses = $status;
        $statuses->update($request->all());
        $statuses->slug =Str::slug($statuses->name);
        $statuses->creater = Auth::user()->id;
        $statuses->save();
        //dd($brands);
        //return redirect()->route('status.index')->with('success','Status Updated successfully.');
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return 'success';
    }
}
