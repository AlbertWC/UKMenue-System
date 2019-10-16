@extends('layouts.app')

@section('content')
    <a href="/venues" class="btn btn-secondary">Go Back</a>
    {{-- <button type="button" class="btn btn-secondary" href=>Secondary</button>  --}}
    <h3>{{$venue->venue_name}}</h3>
    <br>
    <h6>Description: {!!$venue->venue_description!!}</h6>
    <hr>
    <a href="/venues/{{$venue->venue_id}}/edit" class="btn btn-info">Edit</a>

    {!!Form::open(['action' => ['VenueController@destroy', $venue->venue_id], 'method' =>'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection