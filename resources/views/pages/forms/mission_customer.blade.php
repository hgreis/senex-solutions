<h1>Auftrag anlegen: Kunde zuweisen</h1>
<div style="width: 60%; float: left">
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
    </div><hr>
    @include ('pages.forms.customer')
</div>