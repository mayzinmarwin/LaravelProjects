<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::where('status',1)->latest()->paginate(10);
        return view('admin.product.publication.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.publication.create');
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
        $publications = Publication::create($request->except('image'));
        if($request->hasfile('image')){
            $publications->image = Storage::put('uploads/maincategory',$request->file('image'));
            $publications->save();
        }
        $publications->slug =Str::slug($publications->name);
        $publications->creater = Auth::user()->id;
        $publications->save();
        //dd($request);
        return redirect()->route('publication.index')->with('success','Publication created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.product.publication.edit',compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        return view('admin.product.publication.edit',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $this->validate($request,[
            'name' => ['required'],
        ]);
        $publications = $publication;
        $publications->update($request->except('image'));
        if($request->hasfile('image')){
            $publications->image = Storage::put('uploads/maincategory',$request->file('image'));
            $publications->save();
        }
        $publications->slug =Str::slug($publications->name);
        $publications->creater = Auth::user()->id;
        $publications->save();
        //dd($request);
        return redirect()->route('publication.index')->with('success','Puplication Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return 'success';
    }
}
