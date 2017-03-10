@extends('master')

@section('title', 'Смени новост')

@section('content')

	<div class="container">
		<div class="box">
			{{ Form::model($novost, ['url' => route('novosti.update', $novost->id), 'method' => 'PATCH', 'files' => true]) }}

				{{ Form::label('slika1', 'Главна слика', ['class' => 'formlabel']) }}
				{{ Form::file('slika1') }}	

				{{ Form::label('title', 'Наслов', ['class' => 'formlabel']) }}
				{{ Form::text('title', $novost->title, ['class' => 'form-control']) }}			

				{{ Form::label('tekst', 'Текст', ['class' => 'formlabel']) }}
				{{ Form::textarea('tekst', $novost->tekst, ['class' => 'form-control tinyedit']) }}

				{{ Form::label('slika2', 'Втора слика', ['class' => 'formlabel']) }}
				{{ Form::file('slika2') }}

				{{ Form::submit('Запиши промени', ['class' => 'btn btn-warning pull-right']) }}

			{{ Form::close() }}
		</div>
	</div>

@endsection