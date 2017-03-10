@extends('master')

@section('title')

	@if($novost->title == null)
		{{'Новост'}}
	@else
		{{$novost->title}}
	@endif

@endsection

@section('content')

	<div class="container">

		<div class="row">
			<div class="box">
				@if(Auth::check())
					@if(Auth::user()->clearance <= 2)
						<div class="row novost-btn-spacing">
							<div class="col-md-1">
								<a href="{{ route('novosti.edit', $novost->id) }}" class="btn btn-primary novosti-control">Смени</a>
							</div>
							<div class="col-md-1 col-md-offset-10">
								{{ Form::open(['url' => route('novosti.destroy', $novost->id), 'method' => 'DELETE']) }}

									{{ Form::submit('Избриши', ['class' => 'btn btn-danger pull-right novosti-control']) }}

								{{ Form::close() }}
							</div>
						</div>
					@endif
				@endif
				<div class="clearfix"></div>
				@if($novost->slika1)
					<img src="{{ asset('/img/novosti/' . $novost->slika1) }}" class="img-responsive img-border img-full">
				@endif

				@if($novost->title)
					<div class="novost-title">
						<h1>{{$novost->title}}</h1>
					</div>
				@endif

				<br>
				
				<div class="container novost-tekst">
					<p class="novost-tekst">{!!$novost->tekst!!}</p>
				</div>

				@if($novost->slika2)
					<img src="{{ asset('/img/novosti/' . $novost->slika2) }}" class="img-responsive img-border novosti-sec-img img-full">
				@endif

				<a href="/novosti" class="btn btn-warning btn-lg pull-right novosti-control">
					Сите новости
				</a>
			</div>
		</div>
	</div>

@endsection