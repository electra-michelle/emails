<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscriber;

class FilterEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:filter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		$subscribers = \App\Models\Subscriber::get();
		$domains = [];
		foreach($subscribers as $subscriber) {
			$email = $subscriber->email;
			$x = explode('@', $email);
			$domain = end($x);

			if(!in_array($domain, $domains)) {
				$domains[] = $domain;
			}
		}
		
		//$blacklists = [];
		foreach($domains as $domain) {
			if(!checkdnsrr($domain, 'MX')) {
				\App\Models\Subscriber::where('email', 'LIKE', '%@' . $domain)->delete();
				$this->info($domain);
			}
		}
    }
}
