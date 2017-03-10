@extends('master')

@section('title', 'Додади новост')

@section('content')

	<div class="container">

		<div class="box formbox">

			{!! Form::open(['url' => route('novosti.store'), 'method' => 'POST', 
					'files' => true]) !!}

				{{ Form::label('title', 'Наслов:', ['class' => 'formlabel']) }}

				{{ Form::text('title', '', ['class' => 'form-control']) }}

				{{ Form::label('author', 'Автор:', ['class' => 'formlabel']) }}

				{{ Form::text('author', '', ['class' => 'form-control']) }}

				{{ Form::label('slika1', 'Главна Слика:', ['class' => 'formlabel']) }}

				{{ Form::file('slika1', ['class' => 'form-control']) }}

				{{ Form::label('tekst', 'Текст:', ['class' => 'formlabel']) }}

				{{ Form::textarea('tekst', '', ['class' => 'formtextarea form-control tinyedit']) }}

				{{ Form::label('slika2', 'Додатна слика:', ['class' => 'formlabel']) }}

				{{ Form::file('slika2', ['class' => 'formcontrol']) }}

				{{ Form::submit('Додади', ['class' => 'btn btn-primary btn-lg pull-right']) }}

			{!! Form::close() !!}

		</div>

	</div>

@endsection