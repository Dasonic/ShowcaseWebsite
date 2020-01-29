<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$news = News::all()->sortByDesc('posted_at');
        return view('welcome')->with('news', $news);
    }
}
