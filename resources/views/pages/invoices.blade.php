@extends('layouts.main')
@section('content')
@if ($id == 2)
	<div style="background-color: pink; padding: 5px">
@else 
	<div style="background-color: #C10C0C; color: black; padding: 5px">
@endif
		<h1 style="text-align: center">Übersicht aller Rechnungen</h1>
		<table style="width: 100%">
			<tr>
				<th style="padding: 3px"></th>
				<th style="padding: 3px">#</th>
				<th style="padding: 3px">Datum</th>
				<th style="padding: 3px">Bezahlt</th>
				<th style="padding: 3px">Kunde</th>
				<th style="padding: 3px">Netto</th>
				<th style="padding: 3px">Brutto</th>
			</tr>
			@foreach($bills as $bill)
				<tr>
					<th style="padding: 3px"><a class="button" target="_blank" href="/bill/{{ $bill->id }}">Details</a></th>
					<td style="padding: 3px">{{ $bill->number }} </td>
					<td style="padding: 3px">{{ $bill->date }}</td>
					@if ($bill->paid == null)
						<td></td>
					@else
						<td style="padding: 3px">{{ date_format($bill->paid, 'd.m.Y') }} </td>
					@endif
					<td style="padding: 3px">{{ $bill->customer }}</td>
					<td style="padding: 3px">{{ $bill->priceNet }} €</td>
					<td style="padding: 3px">{{ number_format($bill->priceGross, 2, ',', ' ') }} €</td>
				</tr>
			@endforeach
		</table>
	</div>	
@endsection