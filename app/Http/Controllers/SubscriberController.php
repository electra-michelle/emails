<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function test()
    {
        $subscriber = new Subscriber;
        $subscriber->secret = time();
        $subscriber->email = 'jenifermorgan525@gmail.com';

        //return new SubscriberMail($subscriber);
        Mail::to($subscriber->email)->send(new SubscriberMail($subscriber));
    }
}
