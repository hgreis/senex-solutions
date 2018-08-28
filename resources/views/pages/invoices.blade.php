@extends('layouts.main')
@section('content')
	<div style="float: left; width: 600px ;">
		<h1>Übersicht aller Rechnungen</h1>
		<table style="width: 100%">
			<tr>
				<th style="padding: 3px"></th>
				<th style="padding: 3px">#</th>
				<th style="padding: 3px">Datum</th>
				<th style="padding: 3px">Kunde</th>
				<th style="padding: 3px">Netto</th>
				<th style="padding: 3px">Brutto</th>
			</tr>
			@foreach($bills as $bill)
				<tr>
					<th style="padding: 3px"><a class="button" target="_blank" href="/dekra/bill/{{ $bill->id }}">Details</a></th>
					<td style="padding: 3px">{{ $bill->number }} </td>
					<td style="padding: 3px">{{ $bill->date }}</td>
					<td style="padding: 3px">{{ $bill->customer }}</td>
					<td style="padding: 3px">{{ $bill->priceNet }} €</td>
					<td style="padding: 3px">{{ number_format($bill->priceGross, 2, ',', ' ') }} €</td>
				</tr>
			@endforeach
		</table>
	</div>	
	<div style="float: left; margin-left: 10em; width: 300px">
		<h1>Umsatz / Gewinn</h1>
		<table style="width: 100%">
			<tr>
				<th>Monat</th>
				<th>Umsatz</th>
				<th>Gewinn</th>
			</tr>
			<tr>
				<td>Januar</td>
				<td style="text-align: right">
					{{ number_format($missions['jan']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['jan']->sum('preisKunde') - $missions['jan']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>Februar</td>
				<td style="text-align: right">
					{{ number_format($missions['feb']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['feb']->sum('preisKunde') - $missions['feb']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>März</td>
				<td style="text-align: right">
					{{ number_format($missions['mar']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['mar']->sum('preisKunde') - $missions['mar']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>April</td>
				<td style="text-align: right">
					{{ number_format($missions['apr']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['apr']->sum('preisKunde') - $missions['apr']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>Mai</td>
				<td style="text-align: right">
					{{ number_format($missions['may']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['may']->sum('preisKunde') - $missions['may']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>Juni</td>
				<td style="text-align: right">
					{{ number_format($missions['jun']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['jun']->sum('preisKunde') - $missions['jun']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>Juli</td>
				<td style="text-align: right">
					{{ number_format($missions['jul']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">{{ number_format(($missions['jul']->sum('preisKunde') - $missions['jul']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>August</td>
				<td style="text-align: right">
					{{ number_format($missions['aug']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['aug']->sum('preisKunde') - $missions['aug']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>September</td>
				<td style="text-align: right">
					{{ number_format($missions['sep']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">{{ number_format(($missions['sep']->sum('preisKunde') - $missions['sep']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>Oktober</td>
				<td style="text-align: right">
					{{ number_format($missions['oct']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['oct']->sum('preisKunde') - $missions['oct']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>November</td>
				<td style="text-align: right">
					{{ number_format($missions['nov']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['nov']->sum('preisKunde') - $missions['nov']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<td>Dezember</td>
				<td style="text-align: right">
					{{ number_format($missions['dec']->sum('preisKunde'), 2, ',', ' ') }} €
				</td>
				<td style="text-align: right">
					{{ number_format(($missions['dec']->sum('preisKunde') - $missions['dec']->sum('preisFahrer')), 2, ',', ' ') }} €
				</td>
			</tr>
			<tr>
				<th>Summe</th>
				<th style="text-align: right">
					{{ number_format($missions['year']->sum('preisKunde'), 2, ',', ' ') }} €
				</th>
				<th style="text-align: right">
					{{ number_format(($missions['year']->sum('preisKunde') - $missions['year']->sum('preisFahrer')), 2, ',', ' ') }} €
				</th>
			</tr>
		</table>
	</div>
@endsection