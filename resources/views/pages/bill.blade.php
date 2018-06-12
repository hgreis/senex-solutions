@extends('layouts.main')
@section('content')
	<h1>Rechnung generieren</h1>
	<form action="/dekra/saveBill" method="post">
				{{ csrf_field() }}
		@foreach ($customers as $customer)
			<div class="greybox">
				<h3>{{ $customer->name }}</h3>
				@foreach ($customer->missions as $mission)
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