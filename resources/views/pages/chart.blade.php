@extends('layouts.main')
@section('content')
    <h1>Auswertung: {{ $companies->start }} bis {{ $companies->end }}</h1><hr>
    <div>
	    <div class="my1004">
	    	<h3> {{ $companies[0]->nameCompany }} </h3>
	    	<table class="table" style="max-width: 250px" align="center">
	    		<tr>
	    			<th>Umsatz</th>
	    			<td style="text-align: right;">{{ number_format($companies[0]->umsatz, 2) }} €</td>
	    		</tr>
	    		<tr>
	    			<th>Kosten</th>
	    			<td style="text-align: right;">{{ number_format($companies[0]->kosten, 2) }} €</td>
	    		</tr>
	    		<tr>
	    			<th>Gewinn</th>
	    			<td style="text-align: right;">{{ number_format($companies[0]->gewinn, 2) }} €</td>
	    		</tr>
	    	</table>
	    </div>
	    <div class="my1005">
	    	<h3 style="text-align: center"> {{ $companies[1]->nameCompany }} </h3>
	    	<table class="table" style="max-width: 250px" align="center">
	    		<tr>
	    			<th>Umsatz</th>
	    			<td style="text-align: right;">{{ number_format($companies[1]->umsatz, 2) }} €</td>
	    		</tr>
	    		<tr>
	    			<th>Kosten</th>
	    			<td style="text-align: right;">{{ number_format($companies[1]->kosten, 2) }} €</td>
	    		</tr>
	    		<tr>
	    			<th>Gewinn</th>
	    			<td style="text-align: right;">{{ number_format($companies[1]->gewinn, 2) }} €</td>
	    		</tr>
	    	</table>
	    </div>
	    <div class="my1006">
	    	<h3 style="text-align: center"> {{ $companies[2]->nameCompany }} </h3>
	    	<table class="table" style="max-width: 250px" align="center">
	    		<tr>
	    			<th>Umsatz</th>
	    			<td style="text-align: right;">{{ number_format($companies[2]->umsatz, 2) }} €</td>
	    		</tr>
	    		<tr>
	    			<th>Kosten</th>
	    			<td style="text-align: right;">{{ number_format($companies[2]->kosten, 2) }} €</td>
	    		</tr>
	    		<tr>
	    			<th>Gewinn</th>
	    			<td style="text-align: right;">{{ number_format($companies[2]->gewinn, 2) }} €</td>
	    		</tr>
	    	</table>
	    </div>
    </div>
@endsection

