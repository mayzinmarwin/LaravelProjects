<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::where('status',1)->latest()->paginate(10);
        return view('admin.product.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colors = Color::create($request->all());
        $colors->slug =Str::slug($colors->name);
        $colors->creater = Auth::user()->id;
        $colors->save();
        //dd($request);
        //return redirect()->route('color.index')->with('success','Color created successful');
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
    public function edit(Color $color)
    {
        return view('admin.product.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $colors = $color;
        $colors->update($request->all());
        $colors->slug =Str::slug($colors->name);
        $colors->creater = Auth::user()->id;
        $colors->save();
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
    public function destroy(Color $color)
    {
        $color->delete();
        return 'success';
    }
}
