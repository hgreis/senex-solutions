@extends('layouts.main')
@section('content')
	<h1>Rechnung generieren</h1>
	<form action="/saveBill" method="post">
				{{ csrf_field() }}
		@foreach ($customers as $customer)
			<div class="redbox">
				<h3>{{ $customer->name }}</h3>
				@foreach ($customer->missions as $mission)
					<div>
						<input type="checkbox" name="{{ $mission->id }}"> &nbsp;
						{{ date_format(date_create($mission->zielDatum), 'd.m.Y') }} von {{ $mission->startOrt }} nach {{ $mission->zielOrt}}
					</div>
				@endforeach
			</div>
		@endforeach
		@foreach ($customers2 as $customer2)
			<div class="pinkbox">
				<h3>{{ $customer2->name }}</h3>
				@foreach ($customer2->missions as $mission)
					<div>
						<input type="checkbox" name="{{ $mission->id }}"> &nbsp;
						{{ $mission->zielDatum }} von {{ $mission->startOrt }} nach {{ $mission->zielOrt}}
					</div>
				@endforeach
			</div>
		@endforeach
		<input type="submit" name="submit" class="form-control">
	</form>
@endsection 