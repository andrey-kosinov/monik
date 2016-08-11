@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to MONIK!</div>

                <div class="panel-body">
                    <img src="/img/monik.png" style='float:right; width:200px; height:auto;'>
                    <br>
                    <p>MONIK is a simple web sites monitoring tool</p>
                    <p>Just <a href='/register'>register</a> and you can add web sites url to monitor</p>
                    <p>If you are already have an account in our monitoring tool, than <a href='login'>log in</a> to see your web sites monitoring list</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
