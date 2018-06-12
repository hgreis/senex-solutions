@extends('layouts.main')
@section('content') 
<div style="width: 40%; float: left">
		<h1>Kundenübersicht</h1><hr>
		@foreach ($customers as $customer)
				<div class="greybox">
					<div class="flip">
						<h3>{{ $customer->name }}</h3>
					</div>
					<div class="panel">
						{{ $customer->street }}<br>
						{{ $customer->city }} <br> 
						{{ $customer->country }}<br><br>
						Telefon: {{ $customer->phone }} <br>
						Email: {{$customer->email}}<br>
						Steuersatz: {{ $customer->taxes }} %<br>
						Notiz: {{$customer->notice}}<br>
						<button type="button" class="whiteButton" onclick="window.location.href='/dekra/new_customer/{{$customer->id}}'">
							EDIT
						</button>

					</div>
				</div>
			</a>
		@endforeach
</div>
<div style="width: 40%; float: left; margin-left: 10%">
@if (isset($id))
	<h1>Kunde bearbeiten</h1><hr>
@else 
	<h1>Einen neuen Kunden anlegen</h1><hr>
@endif
	<form action="/dekra/save_customer" method="post">
		{{ csrf_field() }}
		<label>Firmenname / Name des Kunden</label>
		@if (isset($id))
			<input type="hidden" name="id" value="{{$id}}">
		@endif
		<input type="text" name="name" value="{{$customerToEdit->name}}" class="form-control" required>
		<label>Strasse & Hausnummer</label>
		<input type="text" name="street" value="{{$customerToEdit->street}}" class="form-control">
		<label>Postleitzahl & Stadt</label>
		<input type="text" name="city" value="{{$customerToEdit->city}}" class="form-control">
		<label>Land</label>
		<input type="text" name="country" value="{{$customerToEdit->country}}" class="form-control">
		<label>Telefon / Mobiltelefon</label>
		<input type="text" name="phone" value="{{$customerToEdit->phone}}" class="form-control">
		<label>Emailadresse</label>
		<input type="text" name="email" value="{{$customerToEdit->email}}" class="form-control">
		<label>Bemerkungen</label>
		<textarea class="form-control" name="notice">{{$customerToEdit->notice}}</textarea><br>
		<label>Steuersatz: &nbsp;</label>
		<select name="taxes">
			<option value="19">19% Mehrwertsteuer</option>
			<option value="0">Mehrwertsteuer befreit</option>
		</select>´<br><br>
		<label>Zahlungsziel: &nbsp;</label>
		<select name="duration">
			<option value="14">14 Tage</option>
			<option value="30">30 Tage</option>
			<option value="7">7 Tage</option>
		</select>´<br><br>
		<input type="submit" name="submit" class="form-control">
	</form><hr>
</div>

<script>
	var acc = document.getElementsByClassName("flip");
	var i;

	for (i = 0; i < acc.length; i++) {
	    acc[i].addEventListener("click", function() {
	        this.classList.toggle("active");
	        var panel = this.nextElementSibling;
	        if (panel.style.display === "block") {
	            panel.style.display = "none";
	        } else {
	            panel.style.display = "block";
	        }
	    });
	}
</script>

@endsection