<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Writer;
use App\Models\Publication;
use App\Models\MainCategory;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('status',1)->get();
        $units = Unit::where('status',1)->get();
        $sizes = Size::where('status',1)->get();
        $colors = Color::where('status',1)->get();
        $writers = Writer::where('status',1)->get();
        $publications = Publication::where('status',1)->get();

        $main_categories = MainCategory::where('status',1)->latest()->get();
        //$latest_maincategory_id = MainCategory::where('status', 1)->first()->id;
        //return $latest_maincategory_id;
        $categories = Category::where('status',1)
                    ->where('main_category_id',MainCategory::where('status',1)
                    ->latest()->first()->id)->latest()->get();
        $categories = Category::where('status',1)->where('main_category_id',MainCategory::where('status',1)->latest()->first()->id)->latest()->get();
        //$latest_category_id = Category::where('status', 1)->where('main_category_id', $latest_maincategory_id)->first()->id;
        // return $latest_category_id;
        $sub_categories = SubCategory::where('status',1)
                        ->where('main_category_id',MainCategory::where('status',1)->latest()->first()->id)
                        ->where('category_id',Category::where('status',1)->where('main_category_id',MainCategory::where('status',1)->latest()->first()->id)->latest()->first()->id)
                        ->latest()->get();
        //return $sub_categories; 
        return view('admin.product.create',compact('brands','colors','sizes',
                                                'units','main_categories','categories',
                                                'sub_categories','writers','publications'));
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
            'brand' => ['required'],
            'main_category_id' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],
            'color_id' => ['required'],
            'size_id' => ['required'],
            'unit_id' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
            'expiration_date' => ['required'],
            'stock' => ['required'],
            'alert_quantity' => ['required'],
            'status' => ['required'],
            'description' => ['required'],
            'features' => ['required'],
            'thumb_image' => ['required'],
            'related_image' => ['required'],

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
