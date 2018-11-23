@extends('layouts.main')
@section('content')
    <h2>Auftragsübersicht #{{ $mission->id }}</h2><br> 
    <h3>Touren-Details</h3>
        <table style="width: 100%">
            <tr>
                <th style="width: 60px"></th>
                <th style="width: 100px">Datum</th>
                <th>Name</th>
                <th>Strasse</th>
                <th>Ort</th>
                <th>Bemerkung</th>
            </tr>
            <tr>
                <td><b>START:</b></td>
                <td>{{ $mission->startDatum }}</td>
                <td>{{ $mission->startName }}</td>
                <td>{{ $mission->startStrasse }}</td>
                <td>{{ $mission->startOrt }}</td>
                <td>{{ $mission->startBemerkung }}</td>
            </tr>
            <tr>
                <td><b>ZIEL:</b></td>
                <td>{{ $mission->zielDatum }}</td>
                <td>{{ $mission->zielName }}</td>
                <td>{{ $mission->zielStrasse }}</td>
                <td>{{ $mission->zielOrt }}</td>
                <td>{{ $mission->zielBemerkung }}</td>
            </tr>
        </table><hr>
    <h3>Fahrer-Details</h3>
        <table>
            <tr>
                <td style="padding: 10px">
                    <b>Fahrer: </b>{{ $mission->driver->name }}
                </td>
                <td style="padding: 10px">
                    Telefon: {{ $mission->driver->phone }}
                </td>
                <td style="padding: 10px">
                    Nummernschild: {{ $mission->driver->number_plate }}
                </td>
            </tr>
            <tr>
                <td style="padding: 10px">
                    <b>Unternehmer: </b>{{ $mission->driver->contractor }}
                </td>
                <td style="padding: 10px">
                    Anschrift: {{ $mission->driver->street }}, {{ $mission->driver->city }}
                </td>
                <td style="padding: 10px">
                    Emailadresse: {{ $mission->driver->email }}
                </td>
            </tr>
            <tr>
                <td style="padding: 10px">Vergütung: {{ $mission->preisFahrer }} €</td>
                <td style="padding: 10px">Gutschrift-Nr.:  </td>
                <td style="padding: 10px">Bezahlt am: </td>
            </tr>
        </table><hr>
    <h3>Auftraggeber</h3>
@endsection