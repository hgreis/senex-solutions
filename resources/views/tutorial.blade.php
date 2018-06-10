@extends('layouts.main')
@section('content')
    <h1>Auftrag anlegen - Abholung</h1>
    <form route="tutorial_save" method="post">
        {{  Form::open(['route' => 'tutorial_save'])  }}
            {{ csrf_field() }}
            <div style="width: 600px; float: left">
                <div class="form-group">
                    {{ Form::label('startDatum', 'Datum:') }}
                    {{ Form::text('startDatum', null, ['class' => 'form-control']) }}
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
            <div style="float: right; width: 300px; padding-top: 100px">
                <div class="form-group">
                    {{ Form::submit('Speichern', ['class' => 'form-control', 'name' => 'submit'])}}

                </div>
            </div>
        {{  Form::close() }}
    </form>
@endsection