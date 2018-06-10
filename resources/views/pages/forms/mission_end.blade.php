<h1>Auftrag anlegen: Touren-Ziel</h1>
<div style="width: 600px; float: left">
    <div class="form-group">
        {{ Form::label('zielDatum', 'Datum:') }}
        {{ Form::text('zielDatum', $input->zielDatum, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielName', 'Name:') }}
        {{ Form::text('zielName', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielStrasse', 'Strasse und Hausnummer:') }}
        {{ Form::text('zielStrasse', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielOrt', 'PLZ und Stadt:') }}
        {{ Form::text('city', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielLand', 'Land:') }}
        {{ Form::text('zielLand', 'Deutschland', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielBemerkung', 'Bemerkung:') }}
        {{ Form::textarea('zielBemerkung', null, ['class' => 'form-control']) }}
    </div>
</div> 