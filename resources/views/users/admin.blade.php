@extends('master')

@section('title', 'Администрирај корисници')

@section('content')

	<div class="box">
		<table class="table table-resposive table-hover">
			<thead>
				<th>Име</th>
				<th>Е-маил</th>
				<th>Креиран</th>
				<th>Последна промена</th>
				<th>Улога</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at}}</td>
						<td>{{ $user->updated_at }}</td>
						<td>
							{{-- {{ $user->clearance }} --}}
							{{ Form::open(['url' => route('user.chmod', $user->id), 'method' => 'POST']) }}
								<select name="selclearance" id="selclearance">
									@foreach($levels as $cl)
										<option value="{{ $cl->level }}" {{ $user->clearance == $cl->level ? "selected" : "" }}>{{ $cl->uloga }}</option>
									@endforeach
								</select>
									
		
								{{ Form::submit('Смени', ['class' => 'btn btn-xs btn-primary']) }}	
								
							{{ Form::close() }}

								{{-- <form action="/korisnici/{{$user->id}}/chmod" method="POST">
									{{ csrf_field() }}

									<input type="submit" value="Смени">
								</form> --}}

								{{-- ['route' => ['route.name', $user->id]] --}}
{{-- 
								{{ Form::open(['url' => '/', 'method' => 'GET']) }}

									{{ Form::submit('Смени', ['class' => 'btn btn-xs btn-primary']) }}

								{{ Form::close() }} --}}
						</td>
						<td>
							{{ Form::open(['url' => "/korisnici/$user->id/delete",'method' => 'DELETE']) }}

								{{ Form::submit('Избриши корисник', ['class' => 'btn btn-danger btn-xs']) }}

							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection