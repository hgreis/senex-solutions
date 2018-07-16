<h1>Auftrag {{ $input->id }}: Kunde zuweisen</h1>
<div style="width: 600px; float: left">
    {{  Form::open(['route' => 'mission_submit'])  }}
    {{ csrf_field() }}
    <div class="form-group">
        {{  Form::label('zielName', 'Name:') }}
        <select name='customer_name' class='form-control'">
                @if (isset($input->kunde))
                    <option value="{{ $input->kunde }}">{{ $input->kunde }}</option>
                @endif
                <option value="">---Bitte Auswählen---</option>
                @foreach ($customers as $customer)
                        <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('kundeBemerkung', 'Bemerkung:') }}
        {{ Form::textarea('kundeBemerkung', $input->kundeBemerkung, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::hidden('id', $input->id) }}
        {{ Form::hidden('customer', 1) }}
        {{ Form::label('preisKunde', 'Preis:') }}
        {{ Form::text('preisKunde', $input->preisKunde, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('missionConfirmation', 'Auftragsbestätigung:') }}
        @if (isset($input->missionConfirmation))
                 <a target="_blank" href="/uploads/{{ $input->id }} Auftragsbestaetigung.pdf">{{ $input->id }} Auftragsbestätigung.pdf </a> 
            @else
                <label>Auftragsbestätigung:</label>
            @endif
            <input type="file" name="missionConfirmation"><br>
    </div>
</div>