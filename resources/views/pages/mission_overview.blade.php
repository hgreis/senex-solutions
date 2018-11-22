@extends('layouts.main')
@section('content')
    <h2>Auftragsübersicht #{{ $mission->id }}</h2><br> 
    <h3>Touren-Details</h3><br>
        <table style="width: 100%">
            <tr>
                <th></th>
                <th>Datum</th>
                <th>Name</th>
                <th>Strasse</th>
                <th>Ort</th>
                <th>Bemerkung</th>
            </tr>
            <tr>
                <td><b>START</b></td>
                <td>{{ $mission->startDatum }}</td>
                <td>{{ $mission->startName }}</td>
                <td>{{ $mission->startStrasse }}</td>
                <td>{{ $mission->startOrt }}</td>
                <td>{{ $mission->startBemerkung }}</td>
            </tr>
            <tr>
                <td><b>ZIEL</b></td>
                <td>{{ $mission->zielDatum }}</td>
                <td>{{ $mission->zielName }}</td>
                <td>{{ $mission->zielStrasse }}</td>
                <td>{{ $mission->zielOrt }}</td>
                <td>{{ $mission->zielBemerkung }}</td>
            </tr>
        </table><hr>
    <h3>Fahrer-Details</h3><br>
        
@endsection