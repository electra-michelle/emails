<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $nextEmails = Subscriber::where('sent', false)->take(5)->get();
		$time = now();
		foreach($nextEmails as $nextEmail) {
			$time = $time
			->addSeconds(rand(7, 12));
			
			Mail::to($nextEmail->email)
				->later($time, new SubscriberMail($nextMail));
				
			$nextEmail->sent = true;
			$nextEmail->save();
		}
    }
}
