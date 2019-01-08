@extends('layouts.main')
@section('content')
	<h1>Rechnung generieren</h1>
	<form action="/saveBill" method="post">
				{{ csrf_field() }}
		@foreach ($customers as $customer)
			<div class="redbox">
				<h3>{{ $customer->name }}</h3>
				<table class="table">
					@foreach ($customer->missions->sortBy('startDatum') as $mission)
						<tr class="my1001">
							<td style="width: 50px; text-align: center">
								<input type="checkbox" name="{{ $mission->id }}"> &nbsp;
							</td>
							@if( $mission->deliveryNote != null)
								<td style="width: 110px">
									<a class="missionOK" 
										target="_blank" 
										href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
									</a>
								</td>
							@else
								<td style="width: 110px">
									<a class="missionNotOK" 
										target="_blank" 
										href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
									</a>
								</td>
							@endif
							<td style="width: 100px">
								{{ date_format(date_create($mission->startDatum), 'd.m.Y') }}
							</td>
							<td>{{ $mission->startOrt }} -> {{ $mission->zielOrt}}</td>
							<td>{{ $mission->kundeBemerkung }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		@endforeach
		@foreach ($customers2 as $customer2)
			<div class="pinkbox">
				<h3>{{ $customer2->name }}</h3>
				<table class="table">
					@foreach ($customer2->missions as $mission)
						<tr class="my1001">
							<td style="width: 50px">
								<input type="checkbox" name="{{ $mission->id }}"> &nbsp;
							</td>
							@if( $mission->deliveryNote != null)
								<td style="width: 110px">
									<a class="missionOK" 
										target="_blank"
										href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
									</a>
								</td>
							@else
								<td style="width: 110px">
									<a class="missionNotOK" 
										target="_blank" 
										href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
									</a>
								</td>
							@endif

							<td style="width: 100px">{{ date_format(date_create($mission->startDatum), 'd.m.Y') }}</td>
							<td>{{ $mission->startOrt }} -> {{ $mission->zielOrt}}</td>
							<td>{{ $mission->kundeBemerkung }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		@endforeach
		<input type="submit" name="submit" class="form-control">
	</form>
@endsection 