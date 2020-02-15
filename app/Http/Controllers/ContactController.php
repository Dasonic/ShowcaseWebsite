<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailController;

class ContactController extends Controller
{
    public function __construct(MailController $mailController)
    {
        $this->mailController = $mailController;
    }

    public function index()
    {
        return view('contact');
    }

    // public function send_mail(Request $request)
    // {
    //     dd($request);
    //     $contact = array(
    //                     'name' => $request->input('name'),
    //                     'email' => $request->input('email'),
    //                     'message' => $request->input('message')
    //     );
    //     $this->MailController->send_contact_message($contact);
    //     return view('contact');
    // }

}
