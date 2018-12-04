@extends('layouts.main')
@section('content')

@if($credits->company == 2)
	<div style="background-color: pink; padding: 5px">
@else
	<div style="background-color: #C10C0C; color: black; padding: 5px">
@endif

		<h1 style="text-align: center">Übersicht aller Gutschriften</h1>
		<table style="width: 100%">
			<tr>
				<th></th>
				<th>#</th>
				<th>Datum</th>
				<th>Bezahlt</th>
				<th>Unternehmer</th>
				<th>Netto</th>
				<th>Brutto</th>
			</tr>
			@foreach( $credits as $credit)
				<tr>
					<td>
						<a class="button" target="_blank" href="/Gutschriften/Sabine Heinrichs Transporte GS-{{$credit->id}}.pdf">Details</a>
					</td>
					<td>{{ $credit->number }} </td>
					<td>{{ date_format(date_create($credit->date), 'd.m.Y') }}</td>
					<td>{{ $credit->credit_paid }}</td>
					<td>{{ $credit->driver->name }}</td>
					<td>{{ number_format($credit->priceNet, 2, ',', ' ') }} €</td>
					<td>{{ number_format($credit->priceGross, 2, ',', ' ') }} €</td>
				</tr>
			@endforeach
		</table>
	

	</div>
@endsection