@extends('layouts.app')

@section('content')
    <a href="/admin/venues" class="btn btn-secondary">Go Back</a>
    {{-- <button type="button" class="btn btn-secondary" href=>Secondary</button>  --}}
    <h3>{{$venue->venue_name}}</h3>
    <br>
    <h6>Description: {!!$venue->venue_description!!}</h6>
    @if (Auth::guard('web')->check())
        <a href="/events/create" class="btn btn-info" type="hidden">Book</a>    
    @endif
    <br>
    {{-- <a href="/calendars/displayevents" class="btn btn-info">View Available Date</a> --}}
    @if (!Auth::guest())
        @if(Auth::guard('admin')->check())
            <a href="/venues/{{$venue->venue_id}}/edit" class="btn btn-info">Edit</a>
            <br>
            {!!Form::open(['action' => ['VenueController@destroy', $venue->venue_id], 'method' =>'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
        
    @endif

    
    
@endsection

@section('calendar')
    <div class="jumbotron" width="200px" height="600px" id="calendarid">
        {!! $calendar->calendar() !!}
    </div>
@endsection

@section('script')
    {!! $calendar->script() !!}
    
@endsection

