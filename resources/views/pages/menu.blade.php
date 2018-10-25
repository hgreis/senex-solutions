@extends('layouts.main')

@section('content')
    <div>
        <h1>STRERATH Transporte</h1>
        <p>
            <button class="blackButton" onclick="window.location.href='/mission/new '" >Auftrag anlegen </button>
            <button class="blackButton" onclick="window.location.href='/mission/view'" >Auftrags Übersicht</button><br>
            <button class="blackButton" onclick="window.location.href='/mission/new '" >Lieferschein eingeben </button>
            <button class="blackButton" onclick="window.location.href='/mission/view'" >Fahrer zuweisen</button>
            <br>
            
            <button class="blackButton" onclick="window.location.href='/dekra/drivers'" >Fahrer verwalten</button>
            <button class="blackButton" onclick="window.location.href='/customer'" >Kunden verwalten</button><br>
            <button class="blackButton" onclick="window.location.href='/bill'" >Rechnung generieren</button><br>
            <button class="brownButton" onclick="window.location.href='/invoices/1'" >Rechnung - Übersicht</button>
            <button class="pinkButton" onclick="window.location.href='/invoices/2'" >Rechnung - Übersicht</button>
        </p>
    </div>
@endsection