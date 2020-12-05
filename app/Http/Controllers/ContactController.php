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
}
