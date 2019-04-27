<?php

namespace App\Http\Controllers;

use App\Pcategory;
use App\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectcategorys = Pcategory::all();
        return view ('admin.projectcategory.index',compact('projectcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* $projectcategory = ProjectCategory::find(1);*/
        return view('admin.projectcategory.create'/*,compact('projectcategory')*/);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectcategory  = new Pcategory();



        foreach(config('translatable.locales') as $langs)

        {
            $projectcategory->{'title:'.$langs } = $request->get('title')[$langs];

           $projectcategory->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }

        $projectcategory->save();
        return back()->with('success','Kategori Eklendi');

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
        $projectcategory = Pcategory::find($id);
        return view('admin.projectcategory.edit',compact('projectcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    project_translation    * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projectcategory  = Pcategory::find($id);



        foreach(config('translatable.locales') as $langs)

        {
            $projectcategory->{'title:'.$langs } = $request->get('title')[$langs];
           /* $projectcategory->{'projectcategory_id:'.$langs} = Str::slug($request->get('projectcategory_id')[$langs]);*/
            $projectcategory->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }

        $projectcategory->save();
        return back()->with('success','Kategori Güncellendi');
    }


    public function destroy($id)
    {
        Pcategory::destroy($id);
        return back()->with('success','Kategori Silinidi');
    }
}
