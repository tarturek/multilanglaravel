<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting.index',compact('setting'));
    }


    public function update(Request $request, $id)
    {
        $ayar = Setting::find(1);

        $ayar->phone1 = request('phone1');
        $ayar->phone2 = request('phone2');
        $ayar->email = request('email');
        $ayar->googlemap = request('googlemap');
        $ayar->facebook = request('facebook');
        $ayar->instagram = request('instagram');
        $ayar->twitter = request('twitter');
        $ayar->linkedin = request('linkedin');

        $ayar->youtube = request('youtube');


        // Logo Yükleme
        if (request()->hasFile('logo')) {

            $validator = Validator::make($request->all(), [
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Logo max 512mb olmalı');
            }

            $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:1024'));
            $logo = request()->file('logo');
            $filename = 'logo' . '-' . time() . '.' . $logo->extension();

            if ($logo->isValid()) {

                $target = 'uploads/logo';
                $filepath = $target . '/' . $filename;
                $logo->move($target, $filename);
                $ayar->logo = $filepath;

            } else {

                return back()->with('error','Logo Yükleme Hatası');;

            }

        }
        // Logo Yükleme

        // Favicon Yükleme
        if (request()->hasFile('favicon')) {

            $validator = Validator::make($request->all(), [
                'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Dosya Boutu Çok Büyük. Max 512MB');
            }
            if (request()->hasFile('favicon')) {

                $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:100'));
                $fav = request()->file('favicon');
                $favdosya_adi = 'favicon' . '-' . time() . '.' . $fav->extension();

                if ($fav->isValid()) {

                    $favhedef_klasor = 'uploads/logo';
                    $favdosya_yolu = $favhedef_klasor . '/' . $favdosya_adi;
                    $fav->move($favhedef_klasor, $favdosya_adi);
                    $ayar->favicon = $favdosya_yolu;

                }
            }
        }
        // Favicon Yükleme

        foreach(config('translatable.locales') as $count => $langs) {

            $ayar->getTranslation($langs)->sitename = $request->get('sitename')[$langs];
            $ayar->getTranslation($langs)->footer_text = $request->get('footer_text')[$langs];

            $ayar->getTranslation($langs)->adress = $request->get('adress')[$langs];

        }
        $ayar->save();
        return back()->with('success','Ayarlar Kaydedildi');
    }



}
