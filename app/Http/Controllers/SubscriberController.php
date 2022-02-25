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
        $subscriber->email = 'test-phv0zcs53@srv1.mail-tester.com';

        return new SubscriberMail($subscriber);
        //Mail::to($subscriber->email)->send(new SubscriberMail($subscriber));
    }
}
