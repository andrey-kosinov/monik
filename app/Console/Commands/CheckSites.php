<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Mail;
use App\Mail\{SiteDead, SiteLive};
Use App\Models\Site;


class CheckSites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:sites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check sites availability';

    private $notificate_error_numbers = [1,3,5,10,20];

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

    	$sites = Site::all();
    	$this->info(PHP_EOL.'Sites count: '.$sites->count().PHP_EOL);
    	foreach($sites as $site) {
    		echo $site->url.PHP_EOL;

    		$response = Http::get($site->url);
    		$site->last_check_tstamp = now();

    		$errors_found = false;

    		if ($response->status() != 200) {
    			$this->line('<bg=red> Error: '.$response->status().' </>');
    			$errors_found = true;
    		} elseif ($site->keyword) {
    			if (!Str::contains($response->body(),$site->keyword)) {
    				$this->line('<bg=red> Error: Keyword not found</> ');
    				$errors_found = true;
    			} else {
    				$this->line('<fg=green>  Ok  </>');
    			}
    		} else {
    			$this->line('<fg=green>  Ok  </>');
    		}

    		if ($errors_found) {
				$site->errors++;
    			if (!$site->first_error_tstamp) {
    				$site->first_error_tstamp = now();
    			}
    			if ( in_array($site->errors,$this->notificate_error_numbers) ) {
    				Mail::to($site->user)->queue(new SiteDead($site));
    			}
    		} else {
    			if ($site->errors>0) {
    				Mail::to($site->user)->queue(new SiteLive($site, $site->first_error_tstamp));
    			}
				$site->errors = 0;
				$site->first_error_tstamp = null;
    		}

    		$site->save();
    	}

    	$this->line('');

        return 0;
    }
}
