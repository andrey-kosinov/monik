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
                                    <td style='text-align:right; white-space:nowrap;'>

										<a href="/site/{{ $site->id }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>

	                                    @if ( ! Auth::guest() )
	                                        <form action="{{url('site/' . $site->id)}}" method="POST" style="display:inline-block;">
	                                            {{ csrf_field() }}
	                                            {{ method_field('DELETE') }}

	                                            <button type="submit" id="delete-site-{{ $site->id }}" class="btn btn-danger">
	                                                <i class="fa fa-trash"></i>
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
            	@include('sites.form',['site'=>null])
            @endif

        </div>
    </div>
</div>
@endsection
