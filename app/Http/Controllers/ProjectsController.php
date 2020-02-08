<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\TagsList;
use App\AppliedTag;

class ProjectsController extends Controller
{
    public function index()
    {
        // Get projects and attached their applied tags as a relation. Only display 5 per page.
        $projects = Project::with('applied_tags.tagslist')->with('screenshots')->simplePaginate(5);
        // Get all the tags for the sidebar
		$tags_list = TagsList::all();
        return view('projects')->with('tags_list', $tags_list)->with('projects', $projects);
    }

    public function index_with_tag($tag_title) {
        // Convert the tag title into its ID
        $tag_id = TagsList::where('title', $tag_title)->first()->id;
        // Get all the projects
        $projects = Project::with('applied_tags.tagslist')->simplePaginate(5);
        $id = 0;
        // If a project gets a matching applied_tag ID, then remove is set to false and it isn't remove from the array.
        // Essentially, remove all the results that don't have a matching tag.
        foreach($projects as $project) {
            $remove = true;
            foreach($project->applied_tags as $tag) {
                if ($tag->id == $tag_id)
                    $remove = false;
            }
            if ($remove)
                unset($projects[$id]);
            $id++;
        }
        // Get all the tags for the sidebar
        $tags_list = TagsList::all();
        return view('projects')->with('tags_list', $tags_list)->with('projects', $projects);
    }
}
