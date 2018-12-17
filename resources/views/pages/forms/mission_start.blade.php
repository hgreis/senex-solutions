@if(isset($input->id))
    <h1>Auftrag {{ $input->id }}: Touren-Start</h1>
@else
    <h1>Auftrag anlegen: Touren-Start</h1>
@endif
<div style="width: 600px; float: left">
    {{  Form::open(['route' => 'mission_submit'])  }}
    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::label('startDatum', 'Datum:') }}
        {{ Form::text('startDatum', $input->startDatum, ['class' => 'form-control', 'required']) }}
        {{ Form::text('id', $input->id, ['hidden' => 'true']) }}
        {{ Form::text('zielDatum', $input->zielDatum, ['hidden' => 'true']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startName', 'Name:') }}
        {{ Form::text('startName', $input->startName, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startStrasse', 'Strasse und Hausnummer:') }}
        {{ Form::text('startStrasse', $input->startStrasse, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startOrt', 'Länderkennung - PLZ und Stadt:') }}
        {{ Form::text('startOrt', $input->startOrt, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startBemerkung', 'Bemerkung:') }}
        {{ Form::textarea('startBemerkung', $input->startBemerkung, ['class' => 'form-control']) }}
    </div>
</div>