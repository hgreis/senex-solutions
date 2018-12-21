@extends('layouts.main')
@section('content')
    <h1>Neuen Auftrag anlegen</h1>
        {{  Form::open(['route' => 'mission_submit'])  }}
        {{ csrf_field() }}
        <h3>
            
            @if ($input->company == 2)
                <input type="radio" name="company" value="1"> STRERATH Transporte &nbsp
                <input type="radio" name="company" value="2" checked> <nobr> Sabine Heinrichs Transporte</nobr><br>
            @else
                <input type="radio" name="company" value="1" checked> STRERATH Transporte &nbsp
                <input type="radio" name="company" value="2"> Sabine Heinrichs Transporte<br>
            @endif
        </h3>
        <div style="width: 45%; min-width: 400px; float: left" class="whitebox">
            <h3>Touren - Start</h3>
                        {{ Form::text('id', $input->id, ['hidden' => 'true']) }}
                        {{ Form::label('startDatum', 'Datum:') }}
                        {{ Form::text('startDatum', $input->startDatum, ['class' => 'form-control', 'required']) }}<br>
                        {{ Form::label('startOrt', 'PLZ und Stadt:') }}
                        {{ Form::text('startOrt', $input->startOrt, ['class' => 'form-control']) }}
        </div>

        <div style="width: 45%; min-width: 400px; float: left" class="whitebox">
            <h3>Touren - Ziel</h3>
                        {{ Form::label('zielDatum', 'Datum:') }}
                        {{ Form::text('zielDatum', $input->zielDatum, ['class' => 'form-control', 'required']) }}<br>
                        {{ Form::label('zielOrt', 'PLZ und Stadt:') }}
                        {{ Form::text('zielOrt', $input->zielOrt, ['class' => 'form-control']) }}
        </div>

        <div style="width: 45%; min-width: 400px; float: left" class="whitebox">
            <h3>Fahrer / Unternehmer</h3>
            {{  Form::label('fahrer', 'Name:') }}
            <select name='fahrer' class='form-control'>
                @if (isset($input->fahrer))
                    <option value="{{ $input->fahrer }}">{{ $input->fahrer }}</option>
                @endif
                <option value="">---Bitte Auswählen---</option>
                @foreach ($drivers as $driver)
                        <option value="{{ $driver->name }}">{{ $driver->name }}</option>
                @endforeach
            </select><br>
            {{ Form::label('preisFahrer', 'Preis (Euro):') }}
            {{ Form::text('preisFahrer', $input->preisFahrer, ['class' => 'form-control']) }}<br>
            @if (isset($input->deliveryNote))
                 <a target="_blank" href="/uploads/{{ $input->id }} Lieferschein.pdf">{{ $input->id }} Lieferschein.pdf </a> 
            @else
                    <label>Ablieferbeleg: </label>
            @endif
            {{ Form::file('deliveryNote') }}
    </div>
        {{  Form::close() }}

@endsection

