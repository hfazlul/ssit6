<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::where('root', 0)->get();
         return view('backend.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::where('root', 0)->get();
        return view('backend.category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
       $request->validate([
            'root' => 'required',
            'name'   => 'required|min:4|max:40|unique:categories',
            'status' => 'required'
        ]);

        try{
            Category::create ([
                'root'      => $request->root,
                'name'      => $request->name,
                'slug'      => slugify($request->name),
                'status'    => $request->status,
                'create_by' => auth()->user()->id,
            ]);
            setMessage('success', 'Yay! A Create has been successfully created');
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
        $categories =Category::where('root', 0)->get();
        $cat= Category::find($id);
        return view ('backend.category.edit', compact('cat', 'categories'));
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
        $category=Category::find($id);
        $request->validate([
            'name'   => 'required|min:2|max:20|unique:brands,id',
            'status' => 'required'
        ]);

        try{
            $category->root      = $request->root;
            $category->name       = $request->name;
            $category->slug       = slugify($request->name);
            $category->status     = $request->status;
            $category->create_by  = auth()->user()->id;
            $category->update();
            setMessage('success', 'Yay! A Category has been successfully Updated.');
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
       $cat= Category::where('root', $id)->get();

       if (!count($cat)){
           $category = Category::find($id);
           $category->delete();
           setMessage('success', 'Yay! A Brand has been successfully created');

       }else{
        setMessage('danger', 'woops! Delete first child category');

       }
       return redirect()->back();
    }
}
