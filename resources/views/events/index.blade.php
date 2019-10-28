@extends('layouts.app')

@section('content')

    @if (count($event)>0)
        @foreach ($event as $eventlist)
        <div class="well">
            <h3>
            <a href="/events/{{$eventlist->id}}">{{$eventlist->eventname}}</a>
            <br>
            <small>Description:{{$eventlist->eventdescription}}</small>

            <br>
            </h3>
        </div>
        @endforeach
    @else
          No Event added  
       
    @endif
@endsection
