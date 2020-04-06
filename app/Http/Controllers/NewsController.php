<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
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
        $news = News::orderBy('posted_at', 'DESC')->simplePaginate(5);
		// $news = News::paginate(5)->sortByDesc('posted_at');
        return view('news')->with('news', $news);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'posted_at' => ['required', 'date'],
            'description' => ['required', 'string'],
        ]);
    }

    public function store(Request $request) {
        $news = new News();
        $news->title = $request->title;
        $news->posted_at = $request->posted_at;
        $news->description = $request->description;
        $news->save();
        return back();
    }

    public function destroy($id)
    {
        $news = News::findorfail($id);
        $news->delete();

        return back();
    }
}
