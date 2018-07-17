@extends('layouts.main')

@section('content')
<script 
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

	<h1>
		Auftrags-Übersicht &nbsp;&nbsp;&nbsp;
	</h1>
	{{-- filter --}}
	<div style="width: 60%; margin-left: 20%" >
		<form method="get" action="/dekra/view" >
			<select name='driver' class='form-control'>
				<option value="">--- Fahrer auswählen ---</option>
				@foreach ($drivers as $driver)
					<option value="{{ $driver->fahrer }} ">{{ $driver->fahrer }}</option>
				@endforeach
			</select>
			<select name='customer' class='form-control'>
				<option value="">--- Kunde auswählen ---</option>
				@foreach ($customers as $customer)
					<option value="{{ $customer->kunde }} ">{{ $customer->kunde }}</option>
				@endforeach
			</select>
			<input type="submit" name="submit" value="FILTERN" class="form-control">
		</form>
	</div>
	<hr>
	@foreach ($missions as $mission)
		<div class="greybox"> 
			<div class="flip">
				<h3>
					{{ $mission->zielDatum }} &nbsp; 
					{{ $mission->kunde }} &nbsp;-&nbsp; 
					Fahrer: {{ $mission->fahrer }} &nbsp;-&nbsp; 
					# {{ $mission->id }}
				</h3>
			</div>
			<div class="panel">
				<?php $input = $mission; ?>
				@include('pages.forms.mission_driver_info')
				<button type="button" class="whiteButton" onclick="window.location.href='/mission/view/{{ $mission->id }}'">EDIT</button>
			</div>
		</div>
	@endforeach
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