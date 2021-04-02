@extends('mail.template')

@section('content')
	@php
		$dead_str = '';
		$dead_period = time()-strtotime($first_error_tstamp);
		if ($dead_period<60) {
			$dead_str = 'less then 1 minute';
		} elseif ($dead_period<60*60) {
			$dead_str = 'for '.round($dead_period/60).' minutes';
		} else {
			$dead_str = 'more then '.floor($dead_period/60/60).' hours';
		}

	@endphp
	<b style="color:green;">You site is up now!</b>
	<br><br>
	Last check of your site {{ $site->url }} was successful and it's good.
	<br><br>
	However, your site was down <b>{{ $dead_str }}</b>

	<br><br>

@endsection