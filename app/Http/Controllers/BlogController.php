<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

use App\Services\PostService;
use App\Models\Tag;

class BlogController extends Controller
{
    //
	public function index(Request $request){
		$tag = $request->get('tag');
		$postService = new PostService($tag);
		$data = $postService->lists();
		$layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';
		return view($layout, $data);
	}
	
	public function showPost($slug, Request $request)
	{
		$post = Post::with('tags')->where('slug', $slug)->firstOrFail();
		$tag = $request->get('tag');
		if ($tag) {
			$tag = Tag::where('tag', $tag)->firstOrFail();
		}
		return view('blog.layouts.post', compact('post', 'tag'));
	}
	
}
