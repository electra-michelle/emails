<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\SentEmail;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->guest()) {
            return redirect('https://playlisters.net');
        }


        $totalEmails = Subscriber::count();

        $sentEmails = SentEmail::count();
        $openedEmails = SentEmail::where('opens', '>', 0)->count();
        $clickedEmails = SentEmail::where('clicks', '>', 0)->count();

        $sendingEmails = DB::table('jobs')->where('queue', 'mail')->count();

        $unsentEmails = Subscriber::where('sent', false)->count();

        return view('home', compact('totalEmails', 'sentEmails', 'unsentEmails', 'openedEmails', 'clickedEmails', 'sendingEmails'));
    }

    public function unsubscribe(Request $request)
    {
        $subscriber = Subscriber::where('email', $request->input('email'))
            ->where('secret', $request->input('token'))
            ->first();

        if ($subscriber) {
            $subscriber->delete();
        }

        return view('unsubscribe');
    }
}
