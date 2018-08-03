<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

use Mail;

class Site extends Model
{
     protected $fillable = ['url'];

    /**
     * Get the user that owns the site.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkSiteURL()
    {
    	$SS = $this;
    	//dd($SS->user);
    	echo $SS->url." (user: ".($SS->user->name).")";

    	$host = parse_url($SS->url)['host'];
		$SS->ip = gethostbyname($host);

		$client = new Client();


		try {
        	$res = @$client->request('HEAD', $SS->url);
        	$code = $res->getStatusCode();
		} catch (RequestException $e) {
			$code = 'error';
		}

		if ($code == 200)
		{
			if ($SS->errors>0)
			{
				if ($SS->errors>=3)
				{
					// Sending OK-letter, that URL response is good
					Mail::send('sites.notification_ok',['user'=>$SS->user,'site'=>$SS],function($m) use ($SS) {

						$m->from('noreply@socmash.ru')->to($SS->user->email,$SS->user->name)->subject('Your web site is healthy now :)');
					});

				}

				$SS->errors = 0;
			}
		}
		else
		{
			// 0000-00-00 always shoud be zero after intval()
			if ( ! intval($SS->first_error_tstamp) )
				$SS->first_error_tstamp = date("Y-m-d H:i:s");


			$SS->errors++;

			if (in_array($SS->errors, [3,10,50,100,500]))
			{
				// Sending BAD-letter, that URL reponse is bad
				Mail::send('sites.notification_bad',['user'=>$SS->user,'site'=>$SS],function($m) use ($SS) {
					$m->from('noreply@socmash.ru')->to($SS->user->email,$SS->user->name)->subject('Your web site is feeling bad :(');
				});

			}

		}

        echo "\n\t$code\n";

		$SS->last_check_tstamp = date("Y-m-d H:i:s");
    	$SS->save();

    }
}
