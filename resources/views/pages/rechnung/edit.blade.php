@extends('layouts.main')
@section('content')
    <h1>Unternehmer-Rechnung: {{ $rechnung->driver->name }} 
        vom {{ date_format(date_create($rechnung->date), 'd.m.Y') }}</h1>
    <form action="/rechnung/new" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
    @if ($rechnung->company == 2)
        <div class="my1002">
    @else
        <div class="my1003">
    @endif
        <div class="my1014">
            {{  Form::label('fahrer', 'Fahrer / Unternehmer:') }}
            <select name='fahrer' class='form-control'>
                @if (isset($rechnung->driver))
                    <option value="{{ $rechnung->driver->name }}">{{ $rechnung->driver->name }}</option>
                @endif
                <option value="">---Bitte Auswählen---</option>
                @foreach ($drivers as $driver)
                        <option value="{{ $driver->name }}">{{ $driver->name }}</option>
                @endforeach
            </select><br>
        </div>
        <div class="my1014" style="float: right">
            @if (isset($input->deliveryNote))
                 <a target="_blank" href="/uploads/{{ $rechnung->id }} Lieferschein.pdf">{{ $rechnung->id }} Lieferschein.pdf </a> 
            @else
                    <label>Unternehmer-Rechnung: </label>
            @endif
            {{ Form::file('doc') }}<br>
        </div>
        <table class="table"> 
            <tr class="my1000">
                <th style="text-align: center">Tour-Nr.</th>
                <th style="text-align: center">Liefer-Datum</th>
                <th>Auftraggeber</th>
                <th colspan="3">Tourenbeschreibung</th>
                <th style="text-align: center">Netto</th>
                <th style="text-align: center"></th>
            </tr>
        @if ($rechnung->missions != null)
            @foreach($rechnung->missions as $mission)
                <tr class="my1001">
                    @if( $mission->deliveryNote != null)
                        <td style="width: 110px">
                            <a class="missionOK" 
                                target="_blank" 
                                href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
                            </a>
                        </td>
                    @else
                        <td style="width: 110px">
                            <a class="missionNotOK" 
                                target="_blank" 
                                href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
                            </a>
                        </td>
                    @endif
                    <td style="width: 120px; text-align: center">
                        {{ date_format(date_create($mission->zielDatum), 'd.m.Y') }}
                    </td>
                    <td>{{ $mission->customer->name}} </td>
                    <td>{{ $mission->startOrt }}</td>
                    <td> &rarr; </td>
                    <td>{{ $mission->zielOrt}}</td>
                    <td style="text-align: right; 
                            width: 150px">{{ number_format($mission->preisFahrer, 2, ',', ' ') }} €
                    </td>
                    <td style="text-align: center">
                        <button class="form-control" 
                                onclick="window.location.href=
                                    '/credit/{{ $rechnung->id }}/add/{{ $mission->id}}'">
                            <b>+</b>
                        </button>
                    </td>
                </tr>
            @endforeach
        @endif
        </table><hr>    
        <h3>Auftrag hinzufügen</h3>
        <table class="table">
            <tr class="my1000">
                <th style="text-align: center">Tour-Nr.</th>
                <th style="text-align: center">Liefer-Datum</th>
                <th>Auftraggeber</th>
                <th colspan="3">Tourenbeschreibung</th>
                <th style="text-align: center">Netto</th>
                <th style="text-align: center"></th>
            </tr>
            @foreach($missions as $mission)
                    <tr class="my1001">
                        @if( $mission->deliveryNote != null)
                            <td style="width: 110px">
                                <a class="missionOK" 
                                    target="_blank" 
                                    href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
                                </a>
                            </td>
                        @else
                            <td style="width: 110px">
                                <a class="missionNotOK" 
                                    target="_blank" 
                                    href="/mission/{{ $mission->id }}/details">Tour-Nr.: {{ $mission->id }}
                                </a>
                            </td>
                        @endif
                        <td style="width: 120px; text-align: center">
                            {{ date_format(date_create($mission->zielDatum), 'd.m.Y') }}
                        </td>
                        <td>{{ $mission->customer->name}} </td>
                        <td>{{ $mission->startOrt }}</td>
                        <td> &rarr; </td>
                        <td>{{ $mission->zielOrt}}</td>
                        <td style="text-align: right; 
                                width: 150px">{{ number_format($mission->preisFahrer, 2, ',', ' ') }} €
                        </td>
                        <td style="text-align: center">
                            <button class="form-control" 
                                    onclick="window.location.href=
                                        '/credit/{{ $rechnung->id }}/add/{{ $mission->id}}'">
                                <b>+</b>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
    </div>
    </form>
@endsection

