@extends('layouts.main')
@section('content')
	@if (isset($mission->id))
		<h1>Auftrag bearbeiten: #{{ $mission->id }} </h1>
	@else
		<h1>Auftrag erstellen</h1>
	@endif
	<form action="/dekra/new" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
		<div style="width: 400px; float: left ">
			<h3>Abholung</h3>
			@if (isset($mission->id))
				<input type="hidden" name="id" value="{{$mission->id}}">	 
			@endif
			<label>Datum: </label>
			<input class="form-control"
				type="date"  
				name="startDatum" 
				value="{{ $mission->startDatum }}" 
				required>
			<label>Name:</label>
			<input class="form-control" 
				type="text" 
				name="startName" 
				value="{{ $mission->startName }}" >
			<label>Strasse:</label>
			<input class="form-control" 
				type="text" 
				name="startStrasse" 
				value="{{ $mission->startStrasse }}" >
			<label>Ort:</label>
			<input class="form-control" 
				type="text" 
				name="startOrt" 
				value="{{ $mission->startOrt }}" >
			<label>Land:</label>
			<input class="form-control" 
				type="text" 
				name="startLand" 
				value="Deutschland" >
			<label>Bemerkung:</label>
			<textarea  
				name="startBemerkung" 
				value="{{ $mission->startBemerkung }}" 
				class="form-control">
			</textarea>
		</div>
		<div style="width: 400px; float: right">
			<h3>Auslieferung</h3>
			<label>Datum: </label>
				<input class="form-control"
					type="date"  
					name="zielDatum" 
					value="{{ $mission->zielDatum }}" >
				<label>Name:</label>
				<input class="form-control" 
					type="text" 
					name="zielName" 
					value="{{ $mission->zielName }}" >
				<label>Strasse:</label>
				<input class="form-control" 
					type="text" 
					name="zielStrasse" 
					value="{{ $mission->zielStrasse }}" >
				<label>Ort:</label>
				<input class="form-control" 
					type="text" 
					name="zielOrt" 
					value="{{ $mission->zielOrt }}" >
				<label>Land:</label>
				<input class="form-control" 
					type="text" 
					name="zielLand" 
					value="Deutschland" >
				<label>Bemerkung:</label>
				<textarea  
					name="zielBemerkung" 
					value="{{ $mission->zielBemerkung }}" 
					class="form-control">
				</textarea><br>
		</div>
		
		<div>
			<input type="submit" name="submit" value="Speichern" class="form-control">
		</div>
		
		<div style="width: 400px; float: left ">
			<br><label>Kunde:</label>
			<input type="text" name="preisKunde" value="{{ $mission->preisKunde }}">  €
			<select name='kunde' class='form-control' value="{{ $mission->kunde }}">
				@if (isset($mission->kunde))
					<option value="{{$mission->kunde}}">{{$mission->kunde}}</option>
				@endif
				<option value="">---Bitte Auswählen---</option>
				@foreach ($customers as $customer)
						<option value="{{ $customer->name }}">{{ $customer->name }}</option>
				@endforeach
			</select><br>
			@if (isset($mission->missionConfirmation))
				 <a target="_blank" href="/uploads/{{ $mission->id }} Auftragsbestaetigung.pdf">{{ $mission->id }} Auftragsbestätigung.pdf </a> 
			@else
				<label>Auftragsbestätigung:</label>
			@endif
		    <input type="file" name="missionConfirmation"><br>
			<label>Bemerkung des Kunden</label>
			<textarea name="kundeBemerkung" class="form-control"></textarea>
		</div>
		<div style="width: 400px; float: right ">
			<br><label>Fahrer: </label>
			<input type="text" name="preisFahrer" value="{{ $mission->preisFahrer }}"> €
			<select name='fahrer' class='form-control' value="{{ $mission->fahrer }}">
				@if (isset($mission->fahrer))
					<option value="{{$mission->fahrer}}">{{$mission->fahrer}}</option>
				@endif
				<option value="">---Bitte Auswählen---</option>
				@foreach ($drivers as $driver)
					<option value="{{ $driver->name }}">{{ $driver->name }}</option>
				@endforeach
			</select><br>
			@if (isset($mission->deliveryNote))
				 <a target="_blank" href="/uploads/{{ $mission->id }} Lieferschein.pdf">{{ $mission->id }} Lieferschein.pdf </a> 
			@else
		    	<label>Ablieferbeleg: </label>
		    @endif
		    <input type="file" name="deliveryNote" ><br>
		    <label>Bemerkung des Fahrers</label>
			<textarea name="fahrerBemerkung" class="form-control"></textarea>
		</div>

	</form>	
	
 

<!-- show informations about customer and driver -->
@if (isset($mission->id))
	<hr>
	<div style="width: 400px; float: left;">
		@if (isset($mission->customer))
			<h2>Kunde</h2>
			{{$mission->customer->name}} <br>
			{{ $mission->customer->street }} &nbsp;/&nbsp; {{ $mission->customer->city }} &nbsp;/&nbsp; {{ $mission->customer->country }} <br>
			Telefon: {{ $mission->customer->phone }} <br>
			Email: {{$mission->customer->email}} <br>
			Steuersatz: {{$mission->customer->taxes}} %<br>
			Bemerkung: {{$mission->customer->notice}} <br>
		@endif
	</div>
	<div style="width: 400px; float: right">
		@if (isset($mission->driver))
			<h2>Fahrer</h2>
			{{ $mission->driver->name }} <br>
			{{ $mission->driver->street }} &nbsp;/&nbsp; {{ $mission->driver->city }} &nbsp;/&nbsp; {{ $mission->driver->land }} <br>
			Telefon: {{ $mission->driver->phone }} <br>
			Email: {{$mission->driver->email}} <br>
			Unternehmer: {{$mission->driver->contractor}} <br>
			Fahrzeug-Modell: {{$mission->driver->car_brand}} <br>
			KFZ-Kennzeichen: {{$mission->driver->number_plate}} <br>
		@endif
	</div>
@endif
@endsection