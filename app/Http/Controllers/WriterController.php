<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    // writer

    public function dashboard(){

        $articles = Auth::user()->articles()->orderBy('created_at' , 'desc')->get();

        $unrevisionedArticles = $articles->where('is_accepted', '===', NULL);
        $acceptedArticles = $articles->where('is_accepted', true);
        $rejectedArticle = $articles->where('is_accepted', '===', 0);

        return view('writer.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticle'));
    }
}
