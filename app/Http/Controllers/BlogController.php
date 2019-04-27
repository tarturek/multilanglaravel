<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\Pcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        $blog = Blog::find(1);
        return view('admin.blog.create',compact('blog','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog  = new Blog();

        if (request()->hasFile('image')) {

            $validator = Validator::make($request->all(), [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Fotoğraf Yüklenmedi');
            }

            $image = request()->file('image');
            $filename = 'image' . '-' . time() . '.' . $image->extension();

            if ($image->isValid()) {

                $target = 'uploads/page';
                $filepath = $target . '/' . $filename;
                $image->move($target, $filename);
                $blog->image = $filepath;

            }
        }
        foreach(config('translatable.locales') as $langs)

        {
            $blog->{'title:'.$langs } = $request->get('title')[$langs];
            $blog->{'content:'.$langs} = $request->get('content')[$langs];
            $blog->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }
        $blog->category = $request->get('category');
        $blog->save();
        return back()->with('success','Blog Eklendi');
    }



    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Pcategory::where('id', '!=', $blog->category)->get();
        return view('admin.blog.edit',compact('blog','categories'));
    }


    public function update(Request $request, $id)
    {
        $blog  = Blog::find($id);


        if (request()->hasFile('image')) {

            $validator = Validator::make($request->all(), [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Fotoğraf Yüklenmedi Max 1024bayt olmalı');
            }

            $image = request()->file('image');
            $filename = 'image' . '-' . time() . '.' . $image->extension();

            if ($image->isValid()) {

                $target = 'uploads/page';
                $filepath = $target . '/' . $filename;
                $image->move($target, $filename);
                $blog->photo = $filepath;

            }
        }
        foreach(config('translatable.locales') as $langs)

        {
            $blog->{'title:'.$langs } = $request->get('title')[$langs];
            $blog->{'content:'.$langs} = $request->get('content')[$langs];
            $blog->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }

        $blog->save();
        return back()->with('success','Blog Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return back()->with('success','Sayfa Silinidi');
    }
}
