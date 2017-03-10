@extends('master')

@section('title', 'Галерија')

@section('content')

	<div class="container">
		<div class="box">
			<div class="row">
				<div class="col-md-3">
					<a href="#addtogallery" data-toggle="collapse" class="btn btn-success btn-lg">
						<i class="fa fa-plus-circle" aria-hidden="true"></i>
						Додади слика во галеријата
					</a>
				</div>
			</div>
			<div class="row collapse" id="addtogallery">
				{{-- <div class="col-md-10 col-md-offset-1"> --}}
				{{ Form::open(['url' => route('gallery.store'), 'method' => 'POST', 'files' => true]) }}

						<div class="col-md-3 col-md-offset1">
							{{ Form::file('slika', ['class' => 'btn btn-success pull-left']) }}
						</div>
						<div class="col-md-1 col-md-offset-1">
							{{ Form::submit('Додади', ['class' => 'btn btn-primary pull-right']) }}
						</div>
				{{ Form::close() }}
				{{-- </div> --}}
			</div>
			<div class="clearfix"></div>
			<hr>
			@include('partials._carousel-div')
			<hr>
			<h2 class="text-center"><small>Моментална</small> галерија</h2>
			<hr>
			@foreach($gis as $gi)
				<img src={{ asset('/img/gallery/' . $gi->image) }} alt="" class="img-responsive img-full">
				<div class="row">
					<div class="col-md-3 col-md-offset-5">
						{{ Form::open(['url' => route('gallery.delete', $gi->id), 'method' => 'DELETE']) }}
								
								{{Form::button('<i class="fa fa-trash-o"></i> Избриши', 
									array('type' => 'submit', 'class' => 'btn btn-danger btn-lg ctrl-btn-spacing'))}}

						{{ Form::close() }}
					</div>
				</div>
				<hr>
			@endforeach
		</div>
	</div>

@endsection