@extends('layouts.main')
@section('content')
    
    <form route="tutorial_save" method="post">
        {{  Form::open(['route' => 'tutorial_save'])  }}
            {{ csrf_field() }}
            
            @if($choice == 'Touren-Start')
            	@include('pages.forms.mission_start')
            @elseif($choice == 'Touren-Ziel')
            	@include('pages.forms.mission_end')
            @endif
            	
            <div style="float: right; width: 300px; padding-top: 50px">
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
                    {{ Form::submit('Dokumentation', [
                    	'class' => 'form-control',
                    	'class' => 'blackButton', 
                    	'name' => 'submit'])}}
                </div>
            </div>
        {{  Form::close() }}
    </form>
@endsection