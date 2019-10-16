@extends('layouts.app')

@section('content')
    <h1>Edit Event details</h1>

    {!!Form::open(['action' => ['EventController@update',$event->id], 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('title', 'Event')}}
            {{Form::text('title', $event->eventname , ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Event Description')}}
            {{Form::textarea('body' , $event->eventdescription, ['id' =>'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Event Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('applicant', 'Event Organizer')}}
            {{Form::text('applicant', $event->eventorganizer , ['class' => 'form-control', 'placeholder' => 'Your Organization Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('venue', 'Venue want to book')}}
            {{Form::select('venue', array('4'=>"ftsm") )}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection