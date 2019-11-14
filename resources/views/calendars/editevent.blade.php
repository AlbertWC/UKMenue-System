{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<body>
    @include('inc.navbar')
    @include('inc.message')

</body>
</html> --}}

@extends('layouts.app')

@section('content')
{{ Form::open(['action' => ['CalendarController@update', $calendar->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
        
        {{Form::label('title', 'Enter Event Name')}}
        {{Form::text('title', $calendar->title, ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
        
        {{Form::label('color', 'Enter Event Color')}}
        {{Form::color('color', $calendar->color, ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
        
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
        
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Resubmit', ['class' => 'btn btn-primary'] )}}
           
    {{Form::close()}}
@endsection