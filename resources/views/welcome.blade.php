@extends('layouts.main')
@section('content')
    <h1>Senex-Solutions  &rArr; NEWS</h1>
    <div>
    	<table class="table">
    		<tr>
                <td style="min-width: 100px">22.01.2018</td>
                <td>
                    Rechnungen: Der Hinweis-Text für die Steuerbefreiung ist eingefügt. Vorgehensweise siehe weiter unten.
                </td>
            </tr>
            <tr>
    			<td style="min-width: 100px">21.01.2018</td>
    			<td>
    				Gutschriften: In der <a href="listCredits/1">Gutschriften-Übersicht</a> ist jetzt ein EDIT-Button. Es lassen sich Auträge im Nachhinein hinzufügen oder entfernen.<br>
                    <b>VORSICHT</b> Nachdem Änderungen vorgenommen wurden, IMMER eine neue PDF erzeugen.
    			</td>
    		</tr>
            <tr>
                <td style="min-width: 100px">19.01.2018</td>
                <td>
                    Rechnungen: Von nun an ist es möglich, Rechnungen ohne Mehrwertsteuer anzufertigen.
                    In der <a href="/customer">Kundenverwaltung</a> stehen unter Steuersatz folgende Optionen zur Auswahl:
                    <p style="margin-left: 30px">
                        &rArr; 19% Mehrwertsteuer<br>
                        &rArr; Mehrwertsteuer befreit §300<br>
                        &rArr; Mehrwertsteuer befreit §305<br>
                    </p>
                    <b>VORSICHT</b> Diese Einstellung ist dauerhaft. Wenn also ein Kunde nur ausnahmsweise eine steuerbefreite Rechhung erhalten soll, bitte daran denken, dem Kunden nach der Generierung der Rechnung wieder den eigentlichen Steuersatz zuzuweisen.<br>
                    <b>VORSICHT</b> Den genauen Wortlaut für §300 und §305 dringend an Heiko.Greis@gmail.com senden.
                </td>
            </tr>
    	</table>
    	<p></p>
    </div>
@endsection

