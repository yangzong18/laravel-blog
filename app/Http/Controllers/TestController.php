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
class TestController extends Controller
{
	public function index(){
		Mail::to('walker@wishnt.com')->send(new TestMail());
	}
}