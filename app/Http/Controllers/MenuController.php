<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Link;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m = new Menu();
        $menus = $m->get();
        // dd($menus);
  
        // $tags = $taxonomies->where(['taxonomy' => 'tags'])->get();
        // $cats = $taxonomies->where(['taxonomy' => 'category'])->get();
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'menu' => 'required',           
        ]);

        $menu = new Menu();
        $menu->menu = $request->menu;
        $menu->description = $request->description;
        $menu->css_class = $request->css_class;
        $menu->css_id = $request->css_id;
        $menu->parent_id = $request->parent_id;
        $menu->region = $request->region;
        $menu->save();
        return redirect('/admin/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menu.view', ['menu' => $menu, 'links' => $menu->links()->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.create', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'menu' => 'required',           
        ]);
        $menu->menu = $request->menu;
        $menu->description = $request->description;
        $menu->css_class = $request->css_class;
        $menu->css_id = $request->css_id;
        $menu->parent_id = $request->parent_id;
        $menu->region = $request->region;
        $menu->save();
        return redirect('/admin/menu');
    }


    public function addLink(Request $request, Menu $menu) {
        $this->validate($request, [
            'menu_id' => 'required',
            'name' => 'required',
            'url' => 'required',
            'weight' => 'required'           
        ]);
        $link = new Link();
        $link->menu_id = $request->menu_id ;
        $link->name = $request->name ;
        $link->url = $request->url ;
        $link->weight = $request->weight ;
        $link->css_class = $request->css_class ;
        $link->css_id = $request->css_id ;
        $link->save();
        return redirect('/admin/menu/' . $menu->id );
    }

    public function deleteLink(Menu $menu, Link $link ) {
        $link->delete();
        return redirect('/admin/menu/' . $menu->id );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        
        return redirect('/admin/menu');
    }
}
