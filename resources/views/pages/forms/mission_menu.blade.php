<div style="float: right; width: 30%; ">
    <div class="form-group">
        @if ($input->company == 2)
            <input type="radio" name="company" value="1"> STRERATH Transporte<br>
            <input type="radio" name="company" value="2" checked> Sabine Heinrichs Transporte<br>
        @else
            <input type="radio" name="company" value="1" checked> STRERATH Transporte<br>
            <input type="radio" name="company" value="2"> Sabine Heinrichs Transporte<br>
        @endif
        


        {{ Form::submit('Touren-Start', [
        	'class' => 'form-control',
        	'class' => 'blackButton', 
        	'name' => 'submit'])}}
        {{ Form::submit('Touren-Ziel', [
        	'class' => 'form-control',
        	'class' => 'blackButton', 
        	'name' => 'submit'])}}
        {{ Form::submit('Kunde', [
        	'class' => 'form-control',
        	'class' => 'blackButton',
        	'name' => 'submit'])}} 
        {{ Form::submit('Fahrer/Unternehmer', [
        	'class' => 'form-control',
        	'class' => 'blackButton', 
        	'name' => 'submit'])}}
        {{ Form::submit('Auftrag Löschen', [
        	'class' => 'form-control',
        	'class' => 'redButton', 
        	'name' => 'submit'])}}
        {{ Form::submit('Speichern/Menu', [
            'class' => 'form-control',
            'class' => 'blackButton', 
            'name' => 'submit'])}}
    </div>
</div>