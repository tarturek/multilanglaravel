<?php

namespace App\Http\Controllers;

use App\ProjectGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $images = $request->file([]);
        foreach ($images as $image) {
            $uzanti = $images->getClientOriginalExtension();
            $uret = Str::Random(10);
            $dosya = $uret. '.'.$uzanti;
            $dizin = 'uploads/proje';
            $resimyol = $dizin.'/'.$dosya;
            $images->move($dizin,$dosya);
            ProjectGalery::create([
                'image'=>$dosya,
                'project'=>$resimyol,
            ]);
        }
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
        $image = ProjectGalery::find($id);
        $imagepath = $image->image_path;
        if(file_exists($imagepath)) {
            $imagedelete = unlink(public_path().'/'.$imagepath);
        }
        ProjectGalery::destroy($id);

        return back()->with('success','Proje Güncellendi');
    }

}
