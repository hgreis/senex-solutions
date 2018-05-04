@extends('layouts.main')

@section('content')
    <div>
        <h1>DEKRA Transporte</h1>
        <p>
            <button class="blackButton" onclick="window.location.href='/dekra/new '" >Auftrag anlegen </button>
            <button class="blackButton" onclick="window.location.href='/dekra/view'" >Auftrags Übersicht</button><br>
            <button class="blackButton" onclick="window.location.href='/dekra/drivers'" >Fahrer verwalten</button>
            <button class="blackButton" onclick="window.location.href='/dekra/new_customer'" >Kunden verwalten</button><br>
            <button class="blackButton" onclick="window.location.href='/dekra/bill'" >Rechnung generieren</button>
            <button class="blackButton" onclick="window.location.href='/dekra/invoices'" >Rechnung - Übersicht</button>
        </p>
    </div>
@endsection