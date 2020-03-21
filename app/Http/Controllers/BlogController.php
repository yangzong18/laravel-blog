<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

use App\Services\PostService;
use App\Models\Tag;
use App\Services\RssFeed;
use App\Services\SiteMap;

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
	
	// 同时在控制器中添加如下这个方法
	public function rss(RssFeed $feed)
	{
		$rss = $feed->getRSS();
		
		return response($rss)
			->header('Content-type', 'application/rss+xml');
	}
	
	// 同时在控制器中新增这个方法
	public function siteMap(SiteMap $siteMap)
	{
		$map = $siteMap->getSiteMap();
		
		return response($map)
			->header('Content-type', 'text/xml');
	}
	
}
