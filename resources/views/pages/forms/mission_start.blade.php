<h1>Auftrag anlegen: Touren-Start</h1>
<div style="width: 600px; float: left">
    <div class="form-group">
        {{ Form::label('startDatum', 'Datum:') }}
        {{ Form::text('startDatum', $input->startDatum, ['class' => 'form-control']) }}
        {{ Form::text('id', $input->id, ['hidden' => 'true']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startName', 'Name:') }}
        {{ Form::text('startName', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startStrasse', 'Strasse und Hausnummer:') }}
        {{ Form::text('startStrasse', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startOrt', 'PLZ und Stadt:') }}
        {{ Form::text('city', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startLand', 'Land:') }}
        {{ Form::text('startLand', 'Deutschland', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('startBemerkung', 'Bemerkung:') }}
        {{ Form::textarea('startBemerkung', null, ['class' => 'form-control']) }}
    </div>
</div> 