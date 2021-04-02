@extends('mail.template')

@section('content')

	<b style="color:red;">You site is down!</b>
	<br><br>
	Last check of your site {{ $site->url }} was unsuccessful.
	<br><br>
	@if ($site->errors>1)
		This is not the first time we get an error.<br>
		Your site is down since <b>{{ date('d/m H:i',strtotime($site->first_error_tstamp)) }}</b>
	@endif

	<br><br>

@endsection