<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\TagsList;
use App\AppliedTag;
use App\Traits\UploadTrait;
use App\Screenshot;
use Illuminate\Support\Facades\Log;

class ProjectsController extends Controller
{
    use UploadTrait;
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
                if ($tag->tag_id == $tag_id)
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

    public function store(Request $request) {
        // dd($request);
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'last_updated_at' => ['required', 'date'],
            'description' => ['required', 'string'],
            'link' => ['required', 'url'],
            // 'screenshot' => ['array'|'image', 'max:2048'],
        ]);
        // dd($request);

        $project = new Project();      
        $project->title = $request->title;
        $project->last_updated_at = $request->last_updated_at;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();
        // Upload Screenshots
        if ($request->screenshots != null) {
            // Get all the images
            $images = $request->file('screenshots');
            // Upload every image and store its location in the screenshots table
            for ($i = 0; $i < sizeof($request->screenshots); $i++) {
                $image = $images[$i];
                $name = $request->title . ' ' . (string)$i;
                $folder = '/screenshots';
                $filePath = '/storage/' . $this->uploadOne($image, $folder, 'public', $name);

                $screenshot = new Screenshot();
                $screenshot->project_id = $project->id;
                $screenshot->image_src = $filePath;
                $screenshot->save();
            }
        }
        // Apply Tags
        // Split into seperate tags
        $tags = explode(' ', $request->tags);
        foreach ($tags as $tag) {
            // Find the tag in TagsList to get the ID
            $tag_info = TagsList::where('title', $tag)->first();
            // If its found, create a new applied tag
            if ($tag_info != null) {
                $applied_tag = new AppliedTag();
                $applied_tag->project_id = $project->id;
                $applied_tag->tag_id = $tag_info->id;
                $applied_tag->save();
            }
        }
        return back();
    }
    public function destroy($id)
    {
        // Find the project
        $project = Project::findorfail($id);
        // Find all the screenshots for the project
        $screenshots = Screenshot::where('project_id', $id)->get();
        // Log::debug("test");
        foreach($screenshots as $screenshot) {
            Log::debug($screenshot->image_src);
            $this->deleteOne($screenshot->image_src, 'public'); // Delete image from storage
            $screenshot->delete(); // Delete from database
        }
        // Find and delete all the applied tags for the project
        AppliedTag::where('project_id', $id)->delete();

        $project->delete();

        return back();
    }
}
