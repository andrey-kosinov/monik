@extends('layouts.app')

@section('content')

    <div class="row my-5">
        <div class="col-md-8">
			<h1 class="mb-4">Welcome to MONIK!</h1>

            <p>MONIK is a simple web sites monitoring tool</p>
            <p>Just <a href='/register'>register</a> and you can add web sites url to monitor</p>
            <p>If you are already have an account in our monitoring tool, than <a href='login'>log in</a> to see your web sites monitoring list</p>

		</div>
		<div class="col-md-3 offset-md-1">
			<div class="bg-dark p-3" style='margin-top:70px;'>
				<img src="/img/monik-logo.png" style='max-width:100%; height:auto;'>
			</div>
        </div>
    </div>

@endsection
