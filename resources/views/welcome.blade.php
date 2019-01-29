@extends('layouts.main')
@section('content')
    <h1>Senex-Solutions  &rArr; NEWS</h1>
    <div>
    	<table class="table">
            <tr>
                <td style="min-width: 100px">29.01.2018</td>
                <td>
                    Fehlende Lieferscheine: Listet alle Auftäge auf, die <br>
                    -> noch keinen Lieferschein haben<br>
                    -> noch keine Rechnungsnummer haben<br>
                    -> noch nicht vom Auftraggeber bezahlt wurden<br>
                    Benutzt den Filter: Lieferscheine werden von Unternehmern eingereicht - der ist also bekannt und beschränkt die Auswahl auf einen Bruchteil. Das angezeigte Datum ist das Lieferdatum und sollte somit mit dem Datum/Stempel auf dem Lieferschein übereinstimmen.<br>Nach einem Klick auf den Auftrag, werden die Auftragsdetails angezeigt. Ein weiterer Klick auf <code>EDIT</code> bewirkt die Weiterleitung zu den Auftrag-Details, wo der Lieferschein hinterlegt werden kann.
                </td>
            </tr>
            <tr>
                <td style="min-width: 100px">28.01.2018</td>
                <td>
                    Rechnungen: Die Rechnungsgenerierung ist jetzt getrennt (Strerath/Heinrichs). 
                </td>
            </tr>
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

