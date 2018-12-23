<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    function __construct()
    {
        $this->middleware('role:superuser')->only('create');
        $this->middleware('role:superuser')->only('delete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
//        dd($request->getBaseUrl());
//        dd($request->query());
        $string = $request->url();
        $pattern = '/(^.*?\/article\/cat)\/(\d+)/i';
        $pattern2 = '/(^.*?\/article)/i';
        $replacement = '$2';
        $replacement2 = '';
        $q = preg_replace($pattern, $replacement, $string);
        $q = preg_replace($pattern2, $replacement2, $q);



//        dd($q);
        if($q){
            return view('admin.articles.index', [
                'articles' => Article::orderBy('articles.created_at', 'desc')
                    ->search($s)
                    ->searchforcat($q)
                    ->paginate(10),
                'showCat' => $q,
                'category' => Category::where('id', $q),
            ]);
        }
        else{
            return view('admin.articles.index', [
                'articles' => Article::orderBy('articles.created_at', 'desc')
                    ->search($s)
                    ->paginate(10),
                'showCat' => ''
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create', [
            'article'    => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        //Categories
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article'    => $article,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->except('slug'));

        //Categories
        $article->categories()->detach();
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.article.index');
    }
}
