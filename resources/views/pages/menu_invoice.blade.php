@extends('layouts.main')

@section('content')
    <div style="text-align: center">
        <h1 style="text-align: left">STRERATH Transporte</h1>

        <div style="float: left; text-align: center; padding: 10px" >
            <h2><b>Auftraggeber</b></h2>
                <button class="blackButton" onclick="window.location.href='/bill'" >Rechnung generieren</button><br>
            <p>
                <button class="brownButton" onclick="window.location.href='/invoices/1'" >Rechnung - Übersicht</button>
                <button class="pinkButton" onclick="window.location.href='/invoices/2'" >Rechnung - Übersicht</button><br>
                <button class="brownButton" onclick="window.location.href='/invoicesPaid/1'" >Zahlungseingang</button>
                <button class="pinkButton" onclick="window.location.href='/invoicesPaid/2'" >Zahlungseingang</button><br>
                <button class="brownButton" onclick="window.location.href='/unpaidMissions/1'" >eingereichte Gutschrift</button>
                <button class="pinkButton" onclick="window.location.href='/unpaidMissions/2'" >eingereichte Gutschrift</button><br>
                <button class="brownButton" onclick="window.location.href='/listing'" >Fahrtenauflistung erstellen</button>
                <button class="brownButton" onclick="window.location.href='/listings'" >Fahrtenauflistungen</button><br>
            </p>
        </div>
        <div style="float: left; text-align: center; padding: 10px">
            <h2><b>Unternehmer</b></h2>
            <button class="brownButton" onclick="window.location.href='/credits/1'" >Gutschrift erstellen</button>
            <button class="pinkButton" onclick="window.location.href='/credits/2'" >Gutschrift erstellen</button><br>
            <button class="brownButton" onclick="window.location.href='/listCredits/1'" >Gutschriften Übersicht</button>
            <button class="pinkButton" onclick="window.location.href='/listCredits/2'" >Gutschriften Übersicht</button><br>
            <button class="brownButton" onclick="window.location.href='/payCredits/1'" >Überweisung bestätigen</button>
            <button class="pinkButton" onclick="window.location.href='/payCredits/2'" >Überweisung bestätigen</button><br>
            <button class="brownButton" onclick="window.location.href=''" >eingereichte Rechnung</button>
            <button class="pinkButton" onclick="window.location.href='/'" >eingereichte Rechnung</button><br>
        </div>
@endsection