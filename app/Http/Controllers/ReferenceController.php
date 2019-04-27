<?php

namespace App\Http\Controllers;

use App\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = Reference::all();
        return view('admin.reference.index', compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference  = new Reference();

        if (request()->hasFile('logo')) {

            $validator = Validator::make($request->all(), [
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Logo Yüklenmedi');
            }

            $logo = request()->file('logo');
            $filename = 'logo' . '-' . time() . '.' . $logo->extension();

            if ($logo->isValid()) {

                $target = 'uploads/page';
                $filepath = $target . '/' . $filename;
                $logo->move($target, $filename);
                $reference->logo = $filepath;

            }
        }


        $reference->save();
        return back()->with('success','Logo Eklendi');


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
        $reference = Reference::find($id);
        return view('admin.reference.edit', compact('reference'));
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
        $reference  = Reference::find($id);


        if (request()->hasFile('logo')) {

            $validator = Validator::make($request->all(), [
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            if (!$validator->passes()) {

                return back()->with('error','Logo Yüklenmedi Max 1024bayt olmalı');
            }

            $logo = request()->file('logo');
            $filename = 'logo' . '-' . time() . '.' . $logo->extension();

            if ($logo->isValid()) {

                $target = 'uploads/page';
                $filepath = $target . '/' . $filename;
                $logo->move($target, $filename);
                $reference->logo = $filepath;

            }
        }


        $reference->save();
        return back()->with('success','Sayfa Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reference::destroy($id);
        return back()->with('success','Sayfa Silinidi');
    }
}
