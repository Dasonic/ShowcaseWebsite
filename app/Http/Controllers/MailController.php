<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class MailController extends Controller
{
    public function send_contact_message(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ]);
        $contact = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        );
        Mail::to('example@email.com')->send(new ContactMessage($contact));
        
        return back();
    }
}
