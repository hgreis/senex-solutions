<div style="float: right; width: 30%; padding-top: 30px">
    <div class="form-group">
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
    </div>
</div>