@extends('layouts.main')

@section('content')
    <div style="text-align: center">
        <h1 style="text-align: left">STRERATH Transporte</h1>
        <h2>Rechnungen an Auftraggeber</h2>
        <p>
            <button class="blackButton" onclick="window.location.href='/bill'" >Rechnung generieren</button><br>
            <button class="blackButton" onclick="window.location.href='/bill'" >Auflistung-Gutschrifterstellung</button><br>
            <button class="brownButton" onclick="window.location.href='/invoices/1'" >Rechnung - Übersicht</button>
            <button class="pinkButton" onclick="window.location.href='/invoices/2'" >Rechnung - Übersicht</button><br>
            <button class="brownButton" onclick="window.location.href='/invoicesPaid/1'" >Zahlungseingang</button>
            <button class="pinkButton" onclick="window.location.href='/invoicesPaid/2'" >Zahlungseingang</button><hr>
            <h2>Unternehmer - Gutschriften</h2>
            <button class="brownButton" onclick="window.location.href='/invoices/1'" >Gutschrift erstellen</button>
            <button class="pinkButton" onclick="window.location.href='/invoices/2'" >Gutschrift erstellen</button>
        </p>
    </div>
@endsection