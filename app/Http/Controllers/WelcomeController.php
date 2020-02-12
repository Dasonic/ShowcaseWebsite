<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class WelcomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('posted_at', 'DESC')->take(3)->get();
        return view('about')->with('news', $news);
    }
}
