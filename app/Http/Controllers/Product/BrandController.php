<?php

namespace App\Http\Controllers\Product;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::where('status',1)->latest()->paginate(10);
        return view('admin.product.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //dd($request->all());
        $this->validate($request,[
            'name' => ['required']
        ]);
        $brands = Brand::create($request->except('logo'));
        if($request->hasfile('logo')){
            $brands->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $brands->save();
        }
        $brands->slug =Str::slug($brands->name);
        $brands->creater = Auth::user()->id;
        $brands->save();
        //dd($request);
        return 'success';
       //return redirect()->route('brand.index')->with('success','Brands created successfully.');
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
        // return view('brand.show',compact(''))
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //dd($brand);
        return view('admin.product.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Brand $brand)
    {
        $this->validate($request,[
            'name' => ['required'],
        ]);
        $brands = $brand;
        $brands->update($request->except('logo'));
        if($request->hasfile('logo')){
            $brands->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $brands->save();
        }
        $brands->slug =Str::slug($brands->name);
        $brands->creater = Auth::user()->id;
        $brands->save();
        //dd($brands);
        return 'success';
        //return redirect()->route('brand.index')->with('success','Brands Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
        //dd($brand);
        $brand->delete();
        return response('success');
        //return redirect()->route('brand.index')->with('success','Brand Deleted Successfully');    
    }
}
