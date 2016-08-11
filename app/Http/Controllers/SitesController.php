<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Site;
use App\User;


class SitesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$sites = $request->user()->sites()->get();

    	return view('sites.index', [
    		'sites' => $sites
    	]);

    }

    public function store(Request $request)
    {
    	$this->validate($request, [
			'url' => 'required|url|max:255',
		]);

		$data = $request->user()->sites()->create([
			'url' => $request->url,
		]);

		return redirect('/sites');
    }

   	public function destroy(Request $request, Site $site)
	{
		$this->authorize('destroy', $site);

		$site->delete();

    	return redirect('/sites');
	}

}
