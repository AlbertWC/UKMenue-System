@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>

    {!!Form::open(['action' => 'EventController@store', 'method' => 'POST'])!!}
        <div class="form-group">
                {{Form::label('eventname', 'Event Name')}}
                {{Form::text('eventname', '', ['class' => 'form-control', 'placeholder' =>'Event Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('eventdescription', 'Event Description')}}
                {{Form::textarea('eventdescription', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' =>'Event Description'])}}
            </div>
        <div class="form-group">
            {{Form::label('eventorganizer', 'Event Organizer')}}
            {{Form::text('eventorganizer', '' , ['class' => 'form-control', 'placeholder' => 'Your Organization Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('venue_id', 'Venue want to book')}}
            {{Form::select('venue_id', array('4'=>"ftsm") )}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!!Form::close()!!}

@endsection