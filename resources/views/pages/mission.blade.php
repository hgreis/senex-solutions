@extends('layouts.main')
@section('content')
            
            @if($choice == 'Touren-Start')
            	@include('pages.forms.mission_start')
            @elseif($choice == 'Touren-Ziel')
            	@include('pages.forms.mission_end')
            @elseif($choice == 'Kunde')
                @include('pages.forms.mission_customer')
            @endif

            @include('pages.forms.mission_menu')

        {{  Form::close() }}
@endsection