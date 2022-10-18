<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::where('status',1)->latest()->paginate(10);
        // return response()->json(
        //     [
        //         "success" => true,
        //         "data"    => $units
            
        //     ]
        // );
        return view('admin.product.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $units = Unit::create($request->all());
        $units->slug =Str::slug($units->name);
        $units->creater = Auth::user()->id;
        $units->save();
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
    public function edit(Unit $unit)
    {
        return view('admin.product.unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $units = $unit;
        $units->update($request->all());
        $units->slug =Str::slug($units->name);
        $units->creater = Auth::user()->id;
        $units->save();
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
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return 'success';
    }
}
