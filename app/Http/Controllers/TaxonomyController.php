<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lecturize\Taxonomies\Models\Taxonomy;
use Lecturize\Taxonomies\Models\Term;
use Lecturize\Taxonomies\TaxableUtils;
use App\Post;

class TaxonomyController extends Controller
{
    public function __construct()
    {
        $utils = new TaxableUtils();
        $utils->createTaxables('blog', 'Category',  $parent = 0, $order = 0);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxonomies = new Taxonomy();
        $taxs = $taxonomies->get()->groupBy('taxonomy');
        
        $tags = $taxonomies->where(['taxonomy' => 'tags'])->get();
        $cats = $taxonomies->where(['taxonomy' => 'category'])->get();
        return view('taxonomy.index', ['taxonomies' => $taxs, 'categories' => $cats, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxonomy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',   
            'taxonomy' => 'required'        
        ]);
        $utils = new TaxableUtils();
        $utils->createTaxables($request->name, $request->taxonomy,  $parent = 0, $order = 0);
        return redirect('/admin/taxonomy');   
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Taxonomy $taxonomy)
    {

        $posts = Post::withTerm($taxonomy->term->name, $taxonomy->taxonomy)->get();
        
        return view('taxonomy.view', ['posts' => $posts, 'taxonomy' => $taxonomy]);
        
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
    public function destroy(Taxonomy $taxonomy)
    {
        if($taxonomy->id !=1 ) {
            $taxonomy->term->forceDelete();
            $taxonomy->forceDelete();
        }
        

        return redirect('/admin/taxonomy');     
        
        
    }
}
