<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $pages = Page::all();
        $menus = Menu::where('topnav','0')->get();
        $menu = Menu::find(1);
        return view('admin.menu.create',compact('menu','menus','pages'));
    }

        public function store(Request $request)
    {
        $menu  = new Menu();


        foreach(config('translatable.locales') as $langs)

        {
            $menu->{'title:'.$langs } = $request->get('title')[$langs];


        }


        $menu->url = request('url');
        $menu->topnav = request('topnav');
        $menu->page = request('page');
        $menu->order = request('order');
        $menu->save();
        return back()->with('success','Menü Eklendi');
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

        $menu = Menu::find($id);
        $pages = Page::where('id','!=', $menu->title)->get();
        $allmenu = Menu::all();
        return view('admin.menu.edit',compact('menu','pages','allmenu'));
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
        $menu  = Menu::find($id);
        foreach(config('translatable.locales') as $langs)

        {
            $menu->{'title:'.$langs } = $request->get('title')[$langs];


        }

        $menu->navmenu_id = request('navmenu_id');
        $menu->url = request('url');
        $menu->topnav = request('topnav');
        $menu->page = request('page');
        $menu->order = request('order');
        $menu->save();
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
        Menu::destroy($id);
        return back()->with('success','Sayfa Silinidi');
    }
}
