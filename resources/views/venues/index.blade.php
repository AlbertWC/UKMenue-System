@extends('layouts.app')

@section('content')
    @if (Auth::guard('admin')->check())
        <a href="/venues/create" class="btn btn-primary">Create venue </a>
    @endif

    @if(count($venue) > 0)
        @foreach ($venue as $venuelist)
            <div class="well">

                {{-- user session --}}
                @if (Auth::guard('web')->check())
                <h3><a href="/venues/{{$venuelist->venue_id}}">{{$venuelist->venue_name}}</a></h3>
                @endif

                {{-- admin session --}}
                @if (Auth::guard('admin')->check())
                <h3><a href="/venues/{{$venuelist->venue_id}}">{{$venuelist->venue_name}}</a></h3>                    
                {{-- old one --}}
                                   
                @endif
            
            <small>Description : {{$venuelist->venue_description}}</small>
            </div>
        @endforeach
        {!! $venue->render()!!}
    @else
        <p>No Venue added</p>
    @endif
@endsection