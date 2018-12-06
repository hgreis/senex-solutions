@extends('layouts.main')
@section('content')
	<div style="background-color: #C10C0C; color: black; padding: 5px">
		<h1 style="text-align: center">Übersicht Fahrtenauflistungen</h1>
		<table style="width: 70%; padding: 10px">
			<tr>
				<th style="padding: 10px">Datum</th>
				<th>Auftraggeber</th>
				<th style="text-align: center">Netto</th>
				<th style="text-align: center">Brutto</th>
				<th style="text-align: center">Details</th>
			</tr>
			@foreach($listings as $listing)
				<tr>
					<td style="padding: 5px">{{ date_format(date_create($listing->date), 'd.m.Y') }}</td>
					<td>{{ $listing->customer->name }}</td>
					<td style="text-align: right; padding-right: 20px">{{ number_format($listing->priceNet,2) }} €</td>
					<td style="text-align: right">{{ number_format($listing->priceGross, 2) }} €</td>
					<td style="text-align: center; width: 120px, padding: 10px">
							<a class="button" target="_blank" href="/Fahrtenauflistungen/Strerath Transporte Liste-{{$listing->id}}.pdf">Details</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection