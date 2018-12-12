@extends('layouts.main')
@section('content')
	<script 
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>

	<h1 style="text-align: center">Fahrten quittieren</h1>
	<div class="redbox">
		@foreach($missions as $customer)
			<div class="flip">
				<h3> {{ $customer[0]->kunde }} </h3>
			</div>
				<div class="panel">
					@foreach($customer as $mission)
						Start: {{ $mission->startOrt }}<br>
					@endforeach
				</div>
		@endforeach
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