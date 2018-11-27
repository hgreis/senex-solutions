@extends('layouts.main')
@section('content')
@if($mission->company == 1)
    <h2>STRERATH TRANSPORTE - Auftragsübersicht #{{ $mission->id }}</h2>
@else
    <h2>SABINE HEINRICHS TRANSPORTE - Auftragsübersicht #{{ $mission->id }}</h2>
@endif
    <h3>Touren-Details</h3>
        <table style="width: 100%">
            <tr>
                <th style="width: 50%">Abholung</th>
                <th style="width: 50%">Auslieferung</th>
            </tr>
            <tr>
                <td style="padding-right: 30px">
                    Datum: {{ $mission->startDatum }}<br>
                    Name: {{ $mission->startName }}<br>
                    Strasse: {{ $mission->startStrasse }}<br>
                    Ort: {{ $mission->startOrt }}<br>
                    Bemerkung: {{ $mission->startBemerkung }}
                </td>
                <td>
                    Datum: {{ $mission->zielDatum }}<br>
                    Name: {{ $mission->zielName }}<br>
                    Strasse: {{ $mission->zielStrasse }}<br>
                    Ort: {{ $mission->zielOrt }}<br>
                    Bemerkung: {{ $mission->zielBemerkung }}
                </td>
            </tr>
        </table><hr>
    <h3>Fahrer-Details</h3>
        <table style="width: 100%">
            <tr>
                <th><b>Fahrer</b></th>
                <th><b>Unternehmer</b></th>
                <th><b>Vergütung</b></th>
            </tr>
            <tr>
                <td>
                    Name: {{ $mission->driver->name }}<br>
                    Telefon: {{ $mission->driver->phone }}<br>
                    Nummernschild: {{ $mission->driver->number_plate }}
                </td>
                <td>
                    Firma: {{ $mission->driver->contractor }}<br>
                    Anschrift: {{ $mission->driver->street }}, {{ $mission->driver->city }}<br>
                    Emailadresse: {{ $mission->driver->email }}
                </td>
                <td>
                    Vereinbarter Preis: {{ $mission->preisFahrer }} €<br>
                    Gutschrift-Nr.: <br>
                    Bezahlt am: 
                </td>
            </tr>
        </table><hr>
    <h3>Auftraggeber</h3>
@endsection