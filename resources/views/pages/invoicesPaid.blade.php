@extends('layouts.main')
@section('content')
@if ($id == 2)
	<div style="background-color: pink; padding: 5px">
@else 
	<div style="background-color: #C10C0C; color: black; padding: 5px">
@endif
		<h1 style="text-align: center">Übersicht aller offenen Rechnungen</h1>
		<form action="/payBill" method="post">
			<table style="width: 100%">
				<tr>
					<th style="padding: 3px"></th>
					<th style="padding: 3px">#</th>
					<th style="padding: 3px">Datum</th>
					<th style="padding: 3px">Kunde</th>
					<th style="padding: 3px">Brutto</th>
					<th style="text-align: center">Bezahlt</th>
				</tr>
				@foreach($bills as $bill)
					<tr>
						<th style="padding: 3px"><a class="button" target="_blank" href="/bill/{{ $bill->id }}">Details</a></th>
						<td style="padding: 3px">{{ $bill->number }} </td>
						<td style="padding: 3px">{{ $bill->date }}</td>
						<td style="padding: 3px">{{ $bill->customer }}</td>
						<td style="padding: 3px">{{ number_format($bill->priceGross, 2, ',', ' ') }} €</td>
						<td style="text-align: center"><input type="checkbox" name="{{ $bill->id }}"></td>
					</tr>
				@endforeach
			</table>
			<input type="submit" name="submit" class="form-control">
	</form>
	</div>	
@endsection