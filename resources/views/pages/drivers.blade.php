@extends('layouts.main')
@section('content')
	<div style="width: 300px; margin-right: 50px; float: left">
		<h3>neuen Fahrer anlegen</h3>
		<form action="/dekra/drivers" method="post">
					{{ csrf_field() }}
			<label>Name: </label>
			<input type="text" class="form-control" name="name" required>
			<label>Strasse:</label>
			<input type="text" name="street" class="form-control">
			<label>Stadt:</label>
			<input type="text" name="city" class="form-control">
			<label>Land:</label>
			<input type="text" name="land" value="Deutschland" class="form-control">
			<label>Telefon:</label>
			<input type="text" name="phone" class="form-control">
			<label>Emailadresse:</label>
			<input type="text" name="email" class="form-control">
			<label>Unternehmer:</label>
			<input type="text" name="contractor" class="form-control">
			<label>Fahrzeug:</label>
			<input type="text" name="car_brand" class="form-control">
			<label>KFZ-Kennzeichen:</label>
			<input type="text" name="number_plate" class="form-control">
			<input type="Submit" name="submit" value="Speichern">
		</form>
	</div>
	<div style="float: left;">
		<h3>Übersicht aller Fahrer</h3>
		<table width="700px">
			<tr>
				<th width="35%">Name</th>
				<th width="25%">Fahrzeug-Typ</th>
				<th width="20%">KFZ-Kennzeichen</th>
				<th width="20%">Telefon</th>
			</tr>
			@foreach ($drivers as $driver)
		 		 <tr>
		 		 	<td>{{ $driver->name }}</td>
		 		 	<td>{{ $driver->car_brand }}</td>
		 		 	<td>{{ $driver->number_plate }}</td>
		 		 	<td>{{$driver->phone}}</td>
		 		 	<td>
		 		 		<a class="redButton" href="/dekra/drivers/{{ $driver->id }}">LÖSCHEN</a>
		 		 	</td>
		 		 </tr>
			@endforeach
		</table>
	</div>

@endsection