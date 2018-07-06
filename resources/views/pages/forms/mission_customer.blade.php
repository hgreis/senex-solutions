<h1>Auftrag anlegen: Kunde zuweisen</h1>
<div style="width: 600px; float: left">
    {{  Form::open(['route' => 'mission_submit_customer'])  }}
    {{ csrf_field() }}
    <div class="form-group">
        {{  Form::label('zielName', 'Name:') }}
        <select name='customer_name' class='form-control'">
                <option value="">---Bitte Auswählen---</option>
                @foreach ($customers as $customer)
                        <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('preisKunde', 'Preis:') }}
        {{ Form::text('preisKunde', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('missionConfirmation', 'Auftragsbestätigung:') }}
        {{ Form::file('Auftrahsbestätigung', null, ['class' => 'form-control']) }}
    </div>
</div>