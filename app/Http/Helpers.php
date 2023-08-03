<?php

use App\Http\Resources\PostResource;
use App\Http\Resources\ProjectResource;
use App\Models\Post;
use App\Models\Project;

if (! function_exists('headline_items')) {
    function headline_items(){ 
        $posts = Post::where('published',1)->where('head_line',1);
        $projects = Project::where('published',1)->where('head_line',1); 
        $posts_collection = collect(PostResource::collection($posts->get()));
        $projects_collection = collect(ProjectResource::collection($projects->get()));
        $merge = $posts_collection->merge($projects_collection);
        $items = collect($merge->sortBy('updated_at')->reverse()->values()->all()); 
        return json_decode($items);
    }
}