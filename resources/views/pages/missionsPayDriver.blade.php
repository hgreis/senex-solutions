@extends('layouts.main')
@section('content')
	<script 
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>

	<h1 style="text-align: center">Eingereichte Unternehmer-Rechnung: Fahrten quittieren</h1>
	
@foreach($missions as $driver)
		<div class="redbox"> 
			<div class="flip">
				<h3>{{ $driver[0]->fahrer }}</h3>
			</div>
			<div class='panel'>
				<table class="table">
						<tr>
							<th>#</th>
							<th>Datum</th>
							<th>Kunde</th>
							<th>Beschreibung</th>
							<th>Netto</th>
							<th></th>
						</tr>
						@foreach($driver as $mission)
							<tr>
								@if( $mission->deliveryNote != null)
									<td style="width: 110px">
										<a class="button" 
											target="_blank" 
											href="/mission_overview/{{ $mission->id }}"
											style="color: black; background-color: green;">Tour-Nr.: {{ $mission->id }}
										</a>
									</td>
								@else
									<td style="width: 110px">
										<a class="button" 
											target="_blank" 
											href="/mission_overview/{{ $mission->id }}"
											style="color: black; background-color: red;">Tour-Nr.: {{ $mission->id }}
										</a>
									</td>
								@endif
								<td style="text-align: center">
									{{ date_format(date_create($mission->startDatum), 'd.m.Y') }}
								</td>
								<td> {{ $mission->kunde }} </td>
								<td>{{ $mission->startOrt }} -> {{ $mission->zielOrt }} </td>
								<td style="text-align: right; padding-right: 15px"> {{ number_format($mission->preisFahrer,2)  }} </td>
								<td>
									<button class="form-control" onclick="window.location.href='/mission/{{ $mission->id }}/payDriver'">BEZAHLT</button>
								</td>
							</tr>
						@endforeach
					</table>
			</div>
		</div>
@endforeach
	</div>
	</form>


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