<?php

namespace App\Http\Controllers;


use App\Pcategory;
use App\Project;
use App\ProjectGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        $images = ProjectGalery::all();
        return view ('admin.project.index',compact('projects','images'));
    }

    public function create()
    {
        $projectcategory = Pcategory::find(1);
        $projectcategorys = Pcategory::all();
        return view('admin.project.create',compact('project','projectcategory','projectcategorys'));
    }


    public function store(Request $request)
    {
        $project  = new Project();

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
                $project->image = $filepath;

            }
        }
        $project->date = request('date');
        foreach(config('translatable.locales') as $langs)

        {
            $project->{'title:'.$langs } = $request->get('title')[$langs];
            $project->{'client:'.$langs } = $request->get('client')[$langs];
            $project->{'location:'.$langs } = $request->get('location')[$langs];
            $project->{'type:'.$langs } = $request->get('type')[$langs];
            $project->{'content:'.$langs} = $request->get('content')[$langs];
            $project->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }
        $project->date = request('date');
        $project->save();

         /////////PROJE GALERİSİNE FOTO EKLEME //////////////
        if ($project) {


            $files = Input::file('images');

            $file_count = count($files);

            $uploadcount = 0;

            foreach ($files as $file) {
                $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file' => $file), $rules);
                if ($validator->passes()) {

                    $galerry = new ProjectGalery();
                    $filename = 'galerry' . '-' . microtime(true) . '.' . $file->extension();
                    $target = 'uploads/projegaleri';
                    $filepath = $target . '/' . $filename;
                    $file->move($target, $filename);
                    $galerry->image = $filepath;
              /*      $galerry->baslik = Str::Random($file->getClientOriginalName());*/

                    $project = Project::orderby('created_at', 'desc')->first();
                    $project_id = $project->id;
                    $galerry->project = $project_id;
                    $galerry->save();

                }
            }

            return back()->with('success','Proje Eklendi');


        } else {
            return back()->with('error','Proje Eklenmedi');

        }



    }


    public function edit($id)
    {
        $project = Project::find($id);
        $projectcategories = Pcategory::where('id','!=',$project->projectcategory_id)->get();
        $galleries = ProjectGalery::where('project',$id)->get();
        return view('admin.project.edit',compact('project','projectcategories','galleries'));
    }

    public function update(Request $request, $id)
    {
        $project  = Project::find($id);


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
                $project->image = $filepath;

            }
        }
        foreach(config('translatable.locales') as $langs)

        {
            $project->{'title:'.$langs } = $request->get('title')[$langs];
            $project->{'client:'.$langs } = $request->get('client')[$langs];
            $project->{'location:'.$langs } = $request->get('location')[$langs];
            $project->{'type:'.$langs } = $request->get('type')[$langs];
            $project->{'content:'.$langs} = $request->get('content')[$langs];
            $project->{'slug:'.$langs} = Str::slug($request->get('title')[$langs]);

        }
        $project->date = request('date');
        $project->save();
        /////////PROJE GALERİSİNE FOTO EKLEME //////////////
        if ($project) {


            $files = Input::file('images');

            $file_count = count($files);

            $uploadcount = 0;

            foreach ($files as $file) {
                $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file' => $file), $rules);
                if ($validator->passes()) {

                    $galerry = new ProjectGalery();
                    $filename = 'galerry' . '-' . microtime(true) . '.' . $file->extension();
                    $target = 'uploads/projegaleri/';
                    $filepath = $target . '/' . $filename;
                    $file->move($target, $filename);
                    $galerry->image = $filepath;
                    $project_id = $id;
                    $galerry->project = $project_id;
                    $galerry->save();

                }
            }

            return back()->with('success','Proje Güncellendi');


        } else {
            return back()->with('success','Proje Güncellenemedi');

        }

    }


    public function destroy($id)
    {
        Project::destroy($id);
        return back()->with('success','Sayfa Silinidi');
    }

    public function gallerydestroy($id)
    {
        $photo = ProjectGalery::find($id);
        $deletefile = $photo->filename;
        File::delete($deletefile);

        $delete = ProjectGalery::destroy($id);
        if($delete) {
            return back()->with('success', 'Fotoğraf Silinidi');
        }else{
            return back()->with('error', 'Fotoğraf Silinmedi');
        }

    }


}
