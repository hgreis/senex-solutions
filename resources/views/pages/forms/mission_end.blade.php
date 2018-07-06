<h1>Auftrag anlegen: Touren-Ziel</h1>
<div style="width: 600px; float: left">
    {{  Form::open(['route' => 'mission_submit'])  }}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('zielDatum', 'Datum:') }}
        {{ Form::text('zielDatum', $input->zielDatum, ['class' => 'form-control']) }}
        {{ Form::hidden('id', $input->id) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielName', 'Name:') }}
        {{ Form::text('zielName', $input->zielName, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielStrasse', 'Strasse und Hausnummer:') }}
        {{ Form::text('zielStrasse', $input->zielStrasse, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielOrt', 'PLZ und Stadt:') }}
        {{ Form::text('zielOrt', $input->zielOrt, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielLand', 'Land:') }}
        {{ Form::text('zielLand', $input->zielLand, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('zielBemerkung', 'Bemerkung:') }}
        {{ Form::textarea('zielBemerkung', $input->zielBemerkung, ['class' => 'form-control']) }}
    </div>
    
</div> 