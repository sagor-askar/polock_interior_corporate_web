<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // contact
    public function contactUs()
    {
        return view('frontend.contact');
    }
}
