@extends('layouts.app')

@section('content')
<a href="/feedbacks" class="btn btn-primary">Back</a>
<h2>{{$feedback->firstname}} {{$feedback->lastname}}</h2>
<h6>{{$feedback->email}}</h6>
<h6>{{$feedback->contact}}</h6>
    <hr>
    <div>
            <h4>{{$feedback->comment}}</h4>
            </div>
    <small>Written on {{$feedback->created_at}}</small>
    <hr>
        <a href="/feedbacks/{{$feedback->id}}/edit" class="btn btn-primary">Edit</a>

        {!!Form::open(['action' => ['FeedbacksController@destroy', $feedback->id], 'method' => 'FEEDBACK', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
@endsection