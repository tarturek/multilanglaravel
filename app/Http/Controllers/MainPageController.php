<?php

namespace App\Http\Controllers;

use App\MainPage;
use App\MpageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainpagesetting = MpageSetting::find(1);
        return view('admin.mainpagesetting.index',compact('mainpagesetting'));
    }



    public function update(Request $request)
    {
        $mainpagesetting = MpageSetting::find(1);

        foreach(config('translatable.locales') as $langs)

        {
            $mainpagesetting->{'title:'.$langs } = $request->get('title')[$langs];
            $mainpagesetting->{'text:'.$langs} = $request->get('text')[$langs];


        }

        $mainpagesetting->save();
        if ($mainpagesetting) {

            return back()->with('success', 'Anasayfa  Ayarları Güncellendi');

        } else {
            return back()->with('error', 'Anasayfa Ayarları Güncellenemedi');


        }
    }


}
