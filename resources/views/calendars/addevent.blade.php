
@extends('layouts.app')

@section('content')
    {{ Form::open(['action' => 'CalendarController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
        
        {{Form::label('title', 'Enter Event Name')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
        
        {{Form::label('color', 'Enter Event Color')}}
        {{Form::color('color', '', ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
        
        {{Form::label('start_date', 'Enter Event Start Date')}}
        <input type="datetime-local" class="form-control" name="start_date" /> 
        {{Form::label('end_date', 'Enter Event End Date')}}
        <input type="datetime-local" class="form-control" name="end_date" />
        
        {{Form::label('event_image', 'Upload Event Poster')}}
        {{Form::file('event_image')}}
        <br>

        {{Form::label('approval_letter', 'Upload Istar Approval Letter')}}
        {{Form::file('approval_letter')}}
        <br>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}
           
    {{Form::close()}}
@endsection