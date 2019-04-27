<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogcategorys = BlogCategory::all();
        return view('admin.blogcategory.index',compact('blogcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogcategory = BlogCategory::find(1);
        return view('admin.blogcategory.create',compact('blogcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogcategory  = new BlogCategory();


        foreach(config('translatable.locales') as $langs)

        {
            $blogcategory->{'title:'.$langs } = $request->get('title')[$langs];

            $blogcategory->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }

        $blogcategory->save();
        return back()->with('success','Sayfa Eklendi');
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
        $blogcategory = BlogCategory::find($id);
        return view('admin.blogcategory.edit',compact('blogcategory'));
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

        $blogcategory  = BlogCategory::find($id);



        foreach(config('translatable.locales') as $langs)

        {
            $blogcategory->{'title:'.$langs } = $request->get('title')[$langs];

            $blogcategory->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }

        $blogcategory->save();
        return back()->with('success','Blog Kategori Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::destroy($id);
        return back()->with('success','Sayfa Silinidi');
    }
}
