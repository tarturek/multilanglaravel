<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index',compact('pages'));
    }


    public function create()
    {

        $page = Page::find(1);
        return view('admin.page.create',compact('page'));
    }


    public function store(Request $request)
    {

        $page  = new Page();

        if (request()->hasFile('photo')) {

            $validator = Validator::make($request->all(), [
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Fotoğraf Yüklenmedi');
            }

            $photo = request()->file('photo');
            $filename = 'photo' . '-' . time() . '.' . $photo->extension();

            if ($photo->isValid()) {

                $target = 'uploads/page';
                $filepath = $target . '/' . $filename;
                $photo->move($target, $filename);
                $page->photo = $filepath;

              }
        }
        foreach(config('translatable.locales') as $langs)

        {
            $page->{'title:'.$langs } = $request->get('title')[$langs];
            $page->{'content:'.$langs} = $request->get('content')[$langs];
            $page->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }

        $page->save();
        return back()->with('success','Sayfa Eklendi');


    }




    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit',compact('page'));
    }


    public function update(Request $request, $id)
    {

        $page  = Page::find($id);


        if (request()->hasFile('photo')) {

            $validator = Validator::make($request->all(), [
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Fotoğraf Yüklenmedi Max 1024bayt olmalı');
            }

            $photo = request()->file('photo');
            $filename = 'photo' . '-' . time() . '.' . $photo->extension();

            if ($photo->isValid()) {

                $target = 'uploads/page';
                $filepath = $target . '/' . $filename;
                $photo->move($target, $filename);
                $page->photo = $filepath;

            }
        }
        foreach(config('translatable.locales') as $langs)

        {
            $page->{'title:'.$langs } = $request->get('title')[$langs];
            $page->{'content:'.$langs} = $request->get('content')[$langs];
            $page->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }

        $page->save();
        return back()->with('success','Sayfa Güncellendi');

    }


    public function destroy($id)
    {
        Page::destroy($id);
        return back()->with('success','Sayfa Silinidi');
    }
}
