@if ($site)
	@extends('layouts.app')

	@section('content')

	<div class="container">

@endif

	<div class="panel panel-default">
        <div class="panel-heading">
        	@if (isset($site->id))
        		URL Properties
        	@else
            	Add New URL
            @endif
        </div>

        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            <form action="{{ url('site') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $site->id ?? '' }}">

                <!-- URL -->
                <div class="form-group">
                    <label for="url" class="col-sm-3 control-label">URL</label>

                    <div class="col-sm-6">
                        <input type="text" name="url" id="url" class="form-control" value="{{ old('url') ?? $site->url ?? '' }}">
                    </div>
                </div>

                <!-- Add  Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Save URL
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@if ($site)

	</div>

	@endsection
@endif