<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscriber;
use Illuminate\Support\Str;

class ImportEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports all emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $csvFileName = "males.csv";
        $csvFile = storage_path($csvFileName);
        $data = $this->readCSV($csvFile, array('delimiter' => ','));

        foreach ($data as $d) {
            foreach ($d as $email) {

                $validator = Validator::make(['email' => $email], [
                    'email' => ['email', 'indisposable']
                ]);

                if ($validator->passes()) {
                    $subscriber = Subscriber::withTrashed()->firstOrCreate(['email' => $email],
                        ['secret' => Str::random()]);
                }

            }

        }
    }
}
