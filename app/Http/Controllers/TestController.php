<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/3/20
 * Time: 18:15
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
	public function index(){
		DB::connection()->enableQueryLog();
		Post::all(['title']);
		Post::all(['id','title','subtitle','published_at']);
		Post::where('id',1)->get(['title']);
		Post::find(1, ['id', 'title','subtitle']);
		Post::get(['id', 'title','subtitle']);
		dump(DB::getQueryLog());
	}
	
	public function demo(){
		echo 111;
	}

    public function queque(){
        \App\Jobs\Wzb::dispatch()->delay(200);
        echo '王召波队列演示';die;
    }
}