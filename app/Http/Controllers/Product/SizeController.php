<?php

namespace App\Http\Controllers\Product;
use App\Models\Size;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::where('status',1)->latest()->paginate(10);
        return view('admin.product.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sizes = Size::create($request->all());
        $sizes->slug =Str::slug($sizes->name);
        $sizes->creater = Auth::user()->id;
        $sizes->save();
        //dd($request);
        //return redirect()->route('size.index')->with('success','Sizes created successful');
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('admin.product.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $sizes = $size;
        $sizes->update($request->all());
        $sizes->slug =Str::slug($sizes->name);
        $sizes->creater = Auth::user()->id;
        $sizes->save();
        //dd($brands);
        //return redirect()->route('size.index')->with('success','size Updated successfully.');
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return 'success';
    }
}
