@extends('layouts.main')

@section('content')
    <div>
        <h1>STRERATH Transporte</h1>
        <p>
            <button class="blackButton" onclick="window.location.href='/mission/new '" >Auftrag anlegen </button>
            <button class="blackButton" onclick="window.location.href='/mission/view'" >Auftrags Übersicht</button><br>
            <button class="blackButton" onclick="window.location.href='/mission/viewNoDriver'" >Fahrer zuweisen</button>
            <button class="blackButton" onclick="window.location.href='/mission/viewNoDeliveryNote '" >Lieferschein eingeben </button>
            <br><hr>
        </p>
    </div>
@endsection