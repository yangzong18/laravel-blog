<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;

use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function showForm(){
    	return view('blog.contact');
	}
	
	public function sendContactInfo(\App\Http\Requests\ContactMeRequest $request){
		$data = $request->only('name', 'email', 'phone');
		$data['messageLines'] = explode("\n", $request->get('message'));
		
		Mail::to($data['email'])->queue(new ContactMail($data));
		
		return back()->with("success", "消息已发送，感谢您的反馈");
	}
}
