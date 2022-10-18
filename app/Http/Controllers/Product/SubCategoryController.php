<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::where('status',1)->latest()->paginate(10);
        return view('admin.product.sub_category.index',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_categories = MainCategory::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->where('main_category_id',MainCategory::where('status',1)->latest()->first()->id)->latest()->get();
        //$categories = Category::where('status',1)->latest()->get();
        return view('admin.product.sub_category.create',compact('main_categories','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'main_category_id' => ['required'],
            'category_id' => ['required'],
            'logo' => ['required'],
        ]);
        $sub_categories = SubCategory::create($request->except('logo'));
        if($request->hasfile('logo')){
            $sub_categories->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $sub_categories->save();
        }
        $sub_categories->slug =Str::slug($sub_categories->name);
        $sub_categories->creater = Auth::user()->id;
        $sub_categories->save();
        //dd($request);
       // return 'success';
        return redirect()->route('sub_category.index')->with('success','Sub Category created successfully.');
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
    public function edit(SubCategory $sub_category)
    {   
        $main_categories = MainCategory::where('status',1)->where('id',$sub_category->main_category_id)->latest()->get();
        //return $main_categories;
        $categories = Category::where('status',1)->where('main_category_id',$sub_category->main_category_id)->latest()->get();
        //$categories = Category::where('status',1)->latest()->get();
        //return $categories;
        return view('admin.product.sub_category.edit',compact('categories','main_categories','sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        $this->validate($request,[
            'name' => ['required'],
            'category_id' =>['required'],
            'main_category_id' => ['required'],
        ]);
        $sub_categories = $sub_category;
        $sub_categories->update($request->except('logo'));
        if($request->hasfile('logo')){
            $sub_categories->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $sub_categories->save();
        }
        $sub_categories->slug =Str::slug($sub_categories->name);
        $sub_categories->creater = Auth::user()->id;
        $sub_categories->save();
        //dd($categories);
        return 'success';
        //return redirect()->route('sub_category.index')->with('success','sub_category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();
        return 'success';
    }
}
