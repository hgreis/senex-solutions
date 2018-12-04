@extends('layouts.main')
@section('content')

@if($credits->company == 2)
	<div style="background-color: pink; padding: 5px">
@else
	<div style="background-color: #C10C0C; color: black; padding: 5px">
@endif

		<h1 style="text-align: center">Übersicht aller Gutschriften</h1>
		<table style="width: 70%">
			<tr>
				<th></th>
				<th>#</th>
				<th style="width: 90px">Datum</th>
				<th style="width: 90px">Bezahlt</th>
				<th>Unternehmer</th>
				<th style="text-align: center">Netto</th>
				<th style="text-align: center">Brutto</th>
			</tr>
			@foreach( $credits as $credit)
				<tr>
					<td style="text-align: center; width: 80px">
						@if($credits->company == 2)
							<a class="button" target="_blank" href="/Gutschriften/Sabine Heinrichs Transporte GS-{{$credit->number}}.pdf">Details</a>
						@else
							<a class="button" target="_blank" href="/Gutschriften/Strerath Transporte GS-{{$credit->number}}.pdf">Details</a>
						@endif
					</td>
					<td>{{ $credit->number }} </td>
					<td>{{ date_format(date_create($credit->date), 'd.m.Y') }}</td>
					<td>{{ $credit->credit_paid }}</td>
					<td>{{ $credit->driver->name }}</td>
					<td style="text-align: right; width: 80px">{{ number_format($credit->priceNet, 2, ',', ' ') }} €</td>
					<td style="text-align: right; width: 80px">{{ number_format($credit->priceGross, 2, ',', ' ') }} €</td>
				</tr>
			@endforeach
		</table>
	

	</div>
@endsection