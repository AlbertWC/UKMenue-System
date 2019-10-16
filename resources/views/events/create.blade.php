@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>

    {!!Form::open(['action' => 'EventController@store', 'method' => 'POST'])!!}
        <div class="form-group">
                {{Form::label('title', 'Event Name')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' =>'Event Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'Event Description')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' =>'Event Description'])}}
            </div>
        <div class="form-group">
            {{Form::label('applicant', 'Event Organizer')}}
            {{Form::text('applicant', '' , ['class' => 'form-control', 'placeholder' => 'Your Organization Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('venue', 'Venue want to book')}}
            {{Form::select('venue', array('4'=>"ftsm") )}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!!Form::close()!!}

@endsection