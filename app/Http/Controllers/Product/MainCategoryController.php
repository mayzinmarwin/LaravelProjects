<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $main_categories = MainCategory::where('status',1)->latest()->paginate(10);
        return view('admin.product.main_category.index',compact('main_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.main_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $main_categories = MainCategory::create($request->except('logo'));
        if($request->hasfile('logo')){
            $main_categories->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $main_categories->save();
        }
        $main_categories->slug =Str::slug($main_categories->name);
        $main_categories->creater = Auth::user()->id;
        $main_categories->save();
        //dd($request);
        return redirect()->route('main_category.index')->with('success','Main Category created successfully.');
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
    public function edit(MainCategory $main_category)
    {
        return view('admin.product.main_category.edit',compact('main_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MainCategory $main_category)
    {
        
        $main_categories = $main_category;
        $main_categories->update($request->except('logo'));
        if($request->hasfile('logo')){
            $main_categories->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $main_categories->save();
        }
        $main_categories->slug =Str::slug($main_categories->name);
        $main_categories->creater = Auth::user()->id;
        $main_categories->save();
        //dd($brands);
        return redirect()->route('main_category.index')->with('success','Main Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainCategory $main_category)
    {
        $main_category->delete();
        return 'success';
    }
}
