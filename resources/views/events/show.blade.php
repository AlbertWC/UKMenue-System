@extends('layouts.app')

@section('content')
    <a href="/events" class="btn btn-secondary">Go Back</a>
    {{-- <button type="button" class="btn btn-secondary" href=>Secondary</button>  --}}
    <h3>{{$event->eventname}}</h3>
    <br>
    <h6>Description: {!!$event->eventdescription!!}</h6>
    <small>Event Organizer: {{$event->eventorganizer}}</small>
    <hr>
    <a href="/events/{{$event->id}}/edit" class="btn btn-info">Edit</a>

    {!!Form::open(['action' => ['EventController@destroy', $event->id], 'method' =>'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection