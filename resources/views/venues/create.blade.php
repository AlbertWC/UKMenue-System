@extends('layouts.app')

@section('content')
        <h1>Create Venue</h1>

        {!! Form::open(['action'=>'VenueController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Venue')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' =>'Venue Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Venue Description')}}
                {{Form::textarea('body', '', ['venue_id' => 'article-ckeditor','class' => 'form-control', 'placeholder' =>'Venue Description'])}}
            </div>
            <div class="form-group">
                {{Form::file('venue_image')}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
@endsection