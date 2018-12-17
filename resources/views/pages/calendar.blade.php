@extends('layouts.main')

@section('content')
<script 
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

	<h1>Kalender-Ansicht - alle Aufträge</h1>
	@foreach($missions as $date)
		<div class="greybox">
			<div class="flip">
				<h3>{{ date_format(date_create($date[0]->startDatum), 'd.m.Y, D') }}</h3>
			</div>
			<div class="panel">
				
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