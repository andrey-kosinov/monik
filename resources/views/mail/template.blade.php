<div style="font-family:Tahoma, Helvetica, Arial; font-size:16px; margin:0; padding:0; background-color:#ddd; overflow:hidden;">
	<div style="margin:20px auto; max-width:800px; background-color:#fff; padding:20px 40px; border-radius:10px;">
		<div style="max-width:100px; margin-bottom:20px;">
			<a href="{{ config('app.url') }}">
				@include('vendor.jetstream.components.authentication-card-logo')
			</a>
		</div>

		@yield('content')

		<div style="text-align:right; margin:50px -40px -20px -40px; padding:20px 40px; border-radius:0 0 10px 10px; background-color:#eee;">
			<a href="{{ config('app.url') }}" style="width:200px; display:inline-block; text-decoration:none;">
				@include('vendor.jetstream.components.application-logo',['responsive'=>true])
			</a>
		</div>
	</div>
</div>