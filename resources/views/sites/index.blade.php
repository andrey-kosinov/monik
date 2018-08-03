@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Web Sites Monitoring List</div>

                <div class="panel-body">

		            @if (count($sites) > 0)
                    <table class="table table-striped task-table">
                        <thead>
                        	<th>ID</th>
                            <th>URL</th>
                            <th>IP</th>
                            <th>Last Check</th>
                            <th>Status</th>
                            <th>Errors</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($sites as $site)
                                <tr class="@if ($site->errors>0) error @else good @endif">
                                	<td class="table-text"><div>{{ $site->id }}</div></td>
                                    <td class="table-text"><div>{{ $site->url }}</div></td>
                                    <td class="table-text"><div>{{ $site->ip }}</div></td>
                                    <td class="table-date"><div>@if ($site->last_check_tstamp != "0000-00-00 00:00:00") {{ date('d/m H:i',strtotime($site->last_check_tstamp)) }} @else not checked @endif</div></td>
                                    <td class="status table-text"><div><em></em></div></td>
                                    <td class="table-text"><div style='padding-left:15px;'>{{ $site->errors }}</div></td>

                                    <!-- Delete Button -->
                                    <td style='text-align:right;'>
                                    @if ( ! Auth::guest() )
                                        <form action="{{url('site/' . $site->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-site-{{ $site->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        You don't have URLs to monitor. Don't wait just add one! ;)
		            @endif

                </div>

            </div>

            @if (Auth::user())
			<div class="panel panel-default">
                <div class="panel-heading">
                    Add New URL
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <form action="{{ url('site') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- URL -->
                        <div class="form-group">
                            <label for="url" class="col-sm-3 control-label">URL</label>

                            <div class="col-sm-6">
                                <input type="text" name="url" id="url" class="form-control" value="{{ old('url') }}">
                            </div>
                        </div>

                        <!-- Add  Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add URL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
