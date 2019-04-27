<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.gallery.create');
    }


    public function store(Request $request)
    {
        // getting all of the post data
        $files = Input::file('images');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;

        foreach ($files as $file) {
            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){

                $galeri = new Gallery();
                $dosya_adi = 'galeri' . '-' . microtime(true)  . '.' . $file->extension();
                $hedef_klasor = 'uploads/gallery';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $file->move($hedef_klasor, $dosya_adi);
                $galeri->image = $dosya_yolu;
                $galeri->order = '1';

                $galeri->save();
            }
        }
        if($galeri){
            return back()->with('success','Fotoğraflar Eklendi');
        } else {
            return back()->with('error','Fotoğraflar Eklenmedi');
        }




    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        Gallery::destroy($id);
        return back()->with('success','Fotoğraf Silinidi');
    }
}
