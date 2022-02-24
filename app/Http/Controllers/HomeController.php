<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\SentEmail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		
		$totalEmails = Subscriber::count();
		
		$sentEmails = SentEmail::count();
		$openedEmails = SentEmail::where('opens', '>', 0)->count();
		$clickedEmails = SentEmail::where('clicks', '>', 0)->count();
		
		$unsentEmails = Subscriber::where('sent', false)->count();
		
        return view('home', compact('totalEmails', 'sentEmails', 'unsentEmails', 'openedEmails', 'clickedEmails'));
    }
}
