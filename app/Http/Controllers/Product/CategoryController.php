<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status',1)->latest()->paginate(10);
        return view('admin.product.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_categories = MainCategory::where('status',1)->latest()->get();
        return view('admin.product.category.create',compact('main_categories'));
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
            'logo' => ['required'],
        ]);
        $categories = Category::create($request->except('logo'));
        if($request->hasfile('logo')){
            $categories->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $categories->save();
        }
        $categories->slug =Str::slug($categories->name);
        $categories->creater = Auth::user()->id;
        $categories->save();
        //dd($request);
        return redirect()->route('category.index')->with('success','Category created successfully.');
    //return redirect()->route('category.index')->with('success','Brands created successfully.');
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
    public function edit(Category $category)
    {
        $main_categories = MainCategory::where('status',1)->latest()->get();
        return view('admin.product.category.edit',compact('category','main_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $this->validate($request,[
            'name' => ['required'],
            'main_category_id' => ['required'],
        ]);
        $categories = $category;
        $categories->update($request->except('logo'));
        if($request->hasfile('logo')){
            $categories->logo = Storage::put('uploads/maincategory',$request->file('logo'));
            $categories->save();
        }
        $categories->slug =Str::slug($categories->name);
        $categories->creater = Auth::user()->id;
        $categories->save();
        //dd($categories);
        return 'success';
        //return redirect()->route('category.index')->with('success','Category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return 'success';
    }
    public function get_category_by_main_category($main_category_id){
        $categories = Category::where('main_category_id',$main_category_id)->get();
        $option = "";
        foreach ($categories as $key=>$value){
            $id = $value->id;
            $name= $value->name;
            $option .= "<option value='$id'>$name</option>";
        }
        return $option;
    }
    public function get_sub_category_by_category($category_id)
    {
        $sub_categories = SubCategory::where('category_id',$category_id)->get();
        $option = "";
        foreach ($sub_categories as $key => $value) {
            $id = $value->id;
            $name = $value->name;
            $option.= "<option".($key==0?' selected ':'')." value='$id' >$name</option>";
        }
        return $option;
    }
}
