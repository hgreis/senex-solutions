@extends('layouts.main')
@section('content')
    <h1>Senex-Solutions</h1><hr>
    <p>
    	Das Unternehmen <b>Senex-Solutions</b> bietet individuelle Software-Lösungen für den Mittelstand. 
    </p>
    <div>
    	<table class="table">
    		<tr>
	    		<th colspan="2"><h3>NEWS</h3></th>
    		</tr>
    		<tr>
    			<td style="min-width: 100px">19.01.2018</td>
    			<td>
    				Rechnungen: Von nun an ist es möglich, Rechnungen ohne Mehrwertsteuer anzufertigen.<br>
    				In der <a href="/customer">Kundenverwaltung</a> stehen unter Steuersatz folgende Optionen zur Auswahl:
    				<li>19% Mehrwertsteuer</li>
    				<li>Mehrwertsteuer befreit §300</li>
    				<li>Mehrwertsteuer befreit §305</li>
    				<br><b>VORSICHT</b> Diese Einstellung ist dauerhaft. Wenn also einn Kunde nur ausnahmsweise eine steuerbefreite Rechhung erhalten soll, bitte daran denken, dem Kunden nach der Generierung der Rechnung wieder den eigentlichen Steuersatz zuzuweisen. 
    			</td>
    		</tr>
    	</table>
    	<p></p>
    </div>
@endsection

