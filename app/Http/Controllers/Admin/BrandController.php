<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
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
        $brands=Brand::with('user')->select('id','name','slug','status','create_by')->get();
        return view('backend.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand =$request->validate([
            'name'   => 'required|min:2|max:20|unique:brands',
            'status' => 'required'
        ]);

        try{
            Brand::create ([
                'name'      => $request->name,
                'slug'      => slugify($request->name),
                'status'    => $request->status,
                'create_by' => auth()->user()->id,
            ]);
            setMessage('success', 'Yay! A Brand has been successfully created');
        }catch(Exception $e){
            setMessage('danger', 'Woops! somthing wrong');
        }

        return redirect()->back();

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
    public function edit($id)
    {
        $brand=Brand::find($id);
        return view ('backend.brand.edit', compact('brand'));
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
        $brand=Brand::find($id);
        $request->validate([
            'name'   => 'required|min:2|max:20|unique:brands,id',
            'status' => 'required'
        ]);

        try{
            $brand->name       = $request->name;
            $brand->slug       = slugify($request->name);
            $brand->status     = $request->status;
            $brand->create_by  = auth()->user()->id;
            $brand->update();
            setMessage('success', 'Yay! A Brand has been successfully Updated.');
        }catch(Exception $e){
            setMessage('danger', 'Woops! somthing wrong.');
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();

    session()->flash('success', 'Yay! A Brand has been successfully deleted');
    return redirect()->back();
    }
}
