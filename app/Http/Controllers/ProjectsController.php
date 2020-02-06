<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\TagsList;

class ProjectsController extends Controller
{
    public function index()
    {
		$tags_list = TagsList::all();
        return view('projects')->with('tags_list', $tags_list);
    }
}
