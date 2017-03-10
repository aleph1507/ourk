@if(Session::has('success'))

	<div class="alert alert-success">
		<p class="lead">{!! Session::get('success') !!}</p>
	</div>

@endif

@if(Session::has('error'))

	<div class="alert alert-danger">
		<p class="lead">{!! Session::get('error') !!}</p>
	</div>

@endif

@if(Session::has('warning'))

	<div class="alert alert-warning">
		<p class="lead">{!! Session::get('warning') !!}</p>
	</div>

@endif


	@if($errors->any())

		<ul class="alert alert-danger flusherr">
			{{-- {{var_dump($errors)}} --}}
			@foreach($errors->all() as $error)
				<li><span class="flushspan">{{$error}}</span></li>
			@endforeach
		</ul>

	@endif