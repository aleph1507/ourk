@extends('master')

@section('title', 'Администрирање вработени')

@section('content')

	<div class="container">
		<div class="box">
			<div class="row">
				<table class="table table-responsive table-stripped table-hover">
					<thead>
						<tr>
							<th>Име</th>
							<th>Позиција</th>
							<th>Влез</th>
							<th>Последна промена</th>
							<th>Смени име</th>
							<th>Смени позиција</th>
							<th>Смени слика</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($vraboteni as $vraboten)
							<tr>
								<td>{{ $vraboten->ime }}</td>
								<td>{{ $vraboten->pozicija }}</td>
								<td>{{ $vraboten->created_at }}</td>
								<td>{{ $vraboten->updated_at }}</td>
								<td>
									{{ Form::model($vraboten, ['url' => route('vraboteni.update', $vraboten->id), 'method' => 'PATCH']) }}

										{{ Form::text('ime') }}

										{{ Form::text('pozicija', $vraboten->pozicija, ['class'=>'hidden']) }}

										{{ Form::submit('Смени', ['class' => 'btn btn-xs btn-primary']) }}

									{{ Form::close() }}
								</td>
								<td>
									
									{{ Form::model($vraboten, ['url' => route('vraboteni.update', $vraboten->id), 'method' => 'PATCH']) }}

										{{ Form::text('ime', $vraboten->ime, ['class' => 'hidden']) }}

										{{ Form::text('pozicija') }}

										{{ Form::submit('Смени', ['class' => 'btn btn-xs btn-primary']) }}

									{{ Form::close() }}

								</td>
								<td>
									{{ Form::model($vraboten, ['url' => route('vraboteni.update', $vraboten->id), 'method' => 'PATCH', 'files' => true]) }}
					
										{{ Form::text('ime', $vraboten->ime, ['class' => 'hidden']) }}
										{{ Form::text('pozicija', $vraboten->pozicija, ['class' => 'hidden']) }}

										{{ Form::file('slika', ['class' => 'form-control']) }}

										{{ Form::submit('Смени', ['class' => 'btn btn-xs btn-primary']) }}


									{{ Form::close() }}
								</td>
								<td>
									{{ Form::open(['url' => route('vraboteni.destroy', $vraboten->id), 'method' => 'DELETE']) }}

										{{ Form::submit('Избриши', ['class' => 'btn btn-xs btn-danger']) }}

									{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="row">
				<div class="col-md-9 col-md-offset-1">
					<h2>Додади Вработен</h2>
					{{ Form::open(['url' => route('vraboteni.store'), 'method' => 'POST', 'files' => true]) }}

						{{ Form::label('ime', 'Име', ['class' => 'formlabel']) }}

						{{ Form::text('ime', '', ['class' => 'form-control']) }}

						{{ Form::label('pozicija', 'Позиција', ['class' => 'formlabel']) }}

						{{ Form::text('pozicija', '', ['class' => 'form-control']) }}

						{{ Form::label('slika', 'Слика', ['class' => 'formlabel']) }}

						{{ Form::file('slika', ['class' => 'form-control']) }}

						{{ Form::submit('Додади', ['class' => 'btn btn-primary pages-spacing']) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection