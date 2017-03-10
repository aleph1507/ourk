@extends('master')

@section('title', 'Општо')

@section('content')

	<div class="container">
		<div class="box">
			<div class="row">
				<div class="col-md-10">
					{{ Form::model($zanas, ['url' => route('zanas.storetekst'), 'method' => 'POST']) }}

						{{ Form::label('textvalue', 'Текст За Нас', ['class' => 'form-label']) }}
						{{ Form::textarea('textvalue', '', ['class' => 'form-control tinyedit']) }}

						{{ Form::text('key', 'zanas', ['class' => 'hidden']) }}

						{{ Form::submit('Напиши', ['class' => 'btn btn-primary pull-right']) }}

					{{ Form::close() }}
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					{{ Form::model($zanas, ['url' => route('zanas.storeslika'), 'method' => 'POST', 'files' => true]) }}

						{{ Form::label('stringvalue', 'Слика За Нас', ['class' => 'form-label']) }}

						{{ Form::file('stringvalue') }}

						{{ Form::text('key', 'zanas', ['class' => 'hidden']) }}

						{{ Form::submit('Смени слика', ['class' => 'btn btn-primary pull right']) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection