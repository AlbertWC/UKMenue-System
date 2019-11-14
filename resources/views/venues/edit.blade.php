@extends('layouts.app')

@section('content')
        <h1>Edit Venue</h1>

        {!! Form::open(['action'=> ['VenueController@update', $venue->venue_id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Venue')}}
                {{Form::text('title', $venue->venue_name, ['class' => 'form-control', 'placeholder' =>'Venue Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Venue Description')}}
                {{Form::textarea('body', $venue->venue_description, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' =>'Venue Description'])}}
            </div>
            <div class="form-group">
                {{Form::file('venue_image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection