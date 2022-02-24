<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function test()
    {
        Mail::to('jenifermorgan525@gmail.com')->send(new SubscriberMail);
    }
}
