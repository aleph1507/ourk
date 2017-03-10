@extends('master')

@section('title', 'Распоред')

@section('content')

	<div class="container">
		<div class="box">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="raspored text-center">
						<p class="lead">
							@if($raspored == null)
								{{ 'Нема поставено распоред' }}
							@else
								<a href="{{ asset($raspored) }}" class="btn btn-default btn-lg">Симни го распоредот</a>
							@endif
						</p>
					</div>
				</div>
			</div>
			@if(Auth::check())
				@if(Auth::user()->clearance<=2)
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							{!! Form::open(['url' => url('raspored'), 'method' => 'POST', 
								'files' => true]) !!}

								{{ Form::label('raspored', 'Одбери распоред', ['class' => 'formlabel']) }}

								{{ Form::file('raspored', ['class' => 'form-control']) }}

								{{ Form::submit('Постави', ['class' => 'btn btn-primary']) }}

							{!! Form::close() !!}
						</div>
					</div>
				@endif
			@endif
		</div>
	</div>
	

@endsection