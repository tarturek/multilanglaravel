<?php

namespace App\Http\Controllers\Main;

use App\Blog;
use App\MpageSetting;
use App\Pcategory;
use App\Project;
use App\ProjectGalery;
use App\Reference;
use App\Service;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MainpageController extends Controller
{


    public function index()
    {
        $slider = Slider::all();
        $services = Service::take(3)->get();
        $index = MpageSetting::find(1);
        $projects = Project::all();
        $news = Blog::orderby('created_at','desc')->take(4)->get();
        $clients = Reference::all();
        return view('main.index',compact('slider','services','index','projects','news','clients'));
    }

    public function projects(){
        $pcategory = Pcategory::all();
        $projects = Project::all();
        return view('main.projects',compact('projects','pcategory'));
    }

    public function project($id){

        $project = Project::find($id);
        $gallery = ProjectGalery::where('project',$id)->get();

        return view('main.project',compact('project','gallery'));
    }

    public function page()
    {
        return view('main.page');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function contactform(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if (!$validator->passes()) {
           return back()->with('error',__('general.formnotsend'));
        }

        $setting = Setting::find(1);
        $sitename = $setting->translate('tr')->sitename;
        $siteemail = $setting->email;

        $sended = array (

            'name'=>request('name'),
            'email'=>request('email'),
            'subject'=>request('subject'),
            'message'=>request('message'),
            'sitename'=>$sitename,
            'siteemail'=>$siteemail,
        );

         $mail = Mail::to($siteemail)->send(new \App\Mail\ContactForm($sended));

         if($mail){

             alert()
                 ->success(__('contact.send') ,__('contact.formsend'))
                 ->autoClose(1000);
             return back();
         }else{
             alert()
                 ->error(__('contact.error') ,__('contact.formnotsend'))
                 ->autoClose(1000);
             return back();
         }


    }

    public function services()
    {
        return view('main.services');
    }

    public function service()
    {
        return view('main.service');
    }

    public function blog()
    {
        $news= Blog::orderby('created_at','desc')->paginate(9);
        return view('main.blog',compact('news'));
    }

    public function post($id)
    {
        $post = Blog::find($id);
        return view('main.post',compact('post'));
    }

    public function gallery()
    {
        return view('main.gallery');
    }


}
