<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = Writer::where('status',1)->latest()->paginate(10);
        return view('admin.product.writer.index',compact('writers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.writer.create');
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

        ]);
        $writers = Writer::create($request->except('image'));
        if($request->hasfile('image')){
            $writers->image = Storage::put('uploads/maincategory',$request->file('image'));
            $writers->save();
        }
        $writers->slug =Str::slug($writers->name);
        $writers->creater = Auth::user()->id;
        $writers->save();
        //dd($request);
        return redirect()->route('writer.index')->with('success','Writer created successfully.');
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
    public function edit(Writer $writer)
    {
        return view('admin.product.writer.edit',compact('writer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Writer $writer)
    {
        $this->validate($request,[
            'name' => ['required'],

        ]);
        $writers = $writer;
        $writers->update($request->except('image'));
        if($request->hasfile('image')){
            $writers->image = Storage::put('uploads/maincategory',$request->file('image'));
            $writers->save();
        }
        $writers->slug =Str::slug($writers->name);
        $writers->creater = Auth::user()->id;
        $writers->save();
        //dd($request);
        return redirect()->route('writer.index')->with('success','Writer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();
        return 'success';
    }
}
