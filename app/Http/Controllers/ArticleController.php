<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class ArticleController extends Controller
{
	public function index()
	{
		return response()->json(Users::all(),200);
	}
}