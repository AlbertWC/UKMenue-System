@extends('layouts.app')

@section('content')
    <h1>Edit Event details</h1>

    {!!Form::open(['action' => ['EventController@update',$event->id], 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('eventname', 'Event')}}
            {{Form::text('eventname', $event->eventname , ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('eventdescription', 'Event Description')}}
            {{Form::textarea('eventdescription' , $event->eventdescription, ['id' =>'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Event Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('eventorganizer', 'Event Organizer')}}
            {{Form::text('eventorganizer', $event->eventorganizer , ['class' => 'form-control', 'placeholder' => 'Your Organization Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('venue_id', 'Venue want to book')}}
            {{Form::select('venue_id', array('4'=>"ftsm") )}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection