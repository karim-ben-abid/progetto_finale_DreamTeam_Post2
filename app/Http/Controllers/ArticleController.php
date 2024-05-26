<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }


    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.byCategory', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.byUser', compact('user', 'articles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('article.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        //  dd($request->all());

        $article = Auth::user()->articles()->create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
        ]);


        if ($request->file('img')) {

            $article->img = $request->file('img')->store('public/img');
            $article->save();
        }

        $tags = explode(',', $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => strtolower($tag)
            ]);
            $article->tags()->attach($newTag);
        }


        return redirect()->back()->with('message', 'Articolo creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {

        $tags = Tag::all();

        $categories = Category::all();

        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        if ($request->file('img')) {
            
            Storage::delete($article->img);

            $img = $request->file('img')
                ->store('public/img');
        } else {

            $img = $article->img;
        }


        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'img' => $img,
            'slug' => Str::slug($request->title),
            'is_accepted' => null

        ]);
        //  $article->category()->sync([$request->categories]);
        return redirect(route('article.index'))->with('message', 'Articolo modificato con successo!');
    }


    public function destroy(Article $article)
    {
        foreach($article->tags as $tag) {
            $article->tags()->detach($tag);
        }
        Storage::delete($article->img);
        $article->delete();
        return redirect(route('article.index'))->with('message','Articolo cancellato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Article $article)
    {

        $article->delete();
        Storage::delete($article->img);

        return redirect(route('article.index'))->with('message', 'Articolo eliminato con successo!');
    }
}
