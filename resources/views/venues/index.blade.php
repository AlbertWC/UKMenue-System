@extends('layouts.app')

@section('content')
        @if(count($venue) > 0)
            @foreach ($venue as $venuelist)
                <div class="well">
                <h3><a href="/venues/{{$venuelist->venue_id}}">{{$venuelist->venue_name}}</a></h3>
                <small>Description : {{$venuelist->venue_description}}</small>
                </div>
            @endforeach
            {!! $venue->render()!!}
        @else
            <p>No Venue added</p>
        @endif


@endsection