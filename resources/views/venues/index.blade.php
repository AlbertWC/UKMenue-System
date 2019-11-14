@extends('layouts.app')

@section('content')
    @if (Auth::guard('admin')->check())
        <a href="/venues/create" class="btn btn-primary">Create venue </a>
    @endif

    @if(count($venue) > 0)
    <h2>Venues List</h2>
    <div class="card">

        @foreach ($venue as $venuelist)
            <div class="card-body">
                <div class="card-text col-md-4 col-sm-4">
                    <img src="/storage/venue_image/{{$venuelist->venue_image}}" alt="Venue Image" width="200px" height="200px">
                </div>
        
                {{-- user session --}}
                <div class="card-text col-md-4 col-sm-4">
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
            </div>
            <hr>
        @endforeach
    </div>
        {!! $venue->render()!!}
    @else
        <p>No Venue added</p>
    @endif
@endsection