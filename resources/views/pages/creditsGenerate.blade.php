@extends('layouts.main')
@section('content')
	<script 
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>

	<h1 style="text-align: center">Unternehmer-Gutschrift erstellen</h1>
	
@foreach($drivers as $driver)
	@if($company == 2)
		<div class="pinkbox"> 
	@else
		<div class="redbox"> 
	@endif
			<div class="flip">
				<h3>{{ $driver->name }}</h3>
			</div>
			<div class='panel'>
				@foreach($driver->missions as $mission)
					<table>
						<tr>
							<td><input type="checkbox"></td>
							@if( $mission->bill_paid != null)
								<td style="width: 100px">
									<a class="button" 
										target="_blank" 
										href="/mission_overview/{{ $mission->id }}"
										style="color: black; background-color: green;">Tour-Nr.: {{ $mission->id }}
									</a>
								</td>

							@else
								<td style="width: 100px">
									<a class="button" 
										target="_blank" 
										href="/mission_overview/{{ $mission->id }}"
										style="color: black; background-color: red;">Tour-Nr.: {{ $mission->id }}
									</a>
								</td>
							@endif
							<td style="width: 100px">{{ $mission->startDatum }}</td>
							<td style="width: 300px">{{ $mission->kunde}}</td>
							<td style="width: 200px">{{ $mission->startOrt}}</td>
							<td style="width: 200px">{{ $mission->zielOrt}}</td>
							<td>{{ $mission->preisFahrer}} €</td>
						</tr>
					</table>	
				@endforeach	
				<button class="form-control" style="background-color: grey; color: white"><b>Gutschrift erstellen</b></button>	
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