@extends('layouts.app')

@section('content')
 {{-- @if (Auth::user()->id == $calendar->user_id)  --}}

 <div class="container">
        <div class="header">
            <h1>List of Events</h1>
        </div>
        <div class="jumbotron">
            <table class="table table-striped table-bordered table-hover">
                <thead class="head">
                    <tr class="warning">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Colour</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach ($calendar as $calendarlist)
                <tbody>
                    @if (!Auth::guest())
                    <tr>
                        <td>{{$calendarlist->id}}</td>
                        <td>{{$calendarlist->title}}</td>
                        <td>{{$calendarlist->color}}</td>
                        <td>{{$calendarlist->start_date}}</td>
                        <td>{{$calendarlist->end_date}}</td>
                        <td>
                        @if ($calendarlist->approval == 1)
                            Approved
                        @elseif($calendarlist->decline == 1)
                            Rejected! 
                            {{$calendarlist->declinemessage}}
                        @else
                            Pending
                        @endif</td>
                        <th>
                            <a href="{{action('CalendarController@edit', $calendarlist['id'])}}" class="btn btn-success"> 
                                Edit 
                            </a>
                        </th>
                        <th>
                        <form action="{{action('CalendarController@destroy', $calendarlist['id'])}}" method="POST">
                                {{ csrf_field() }}
                            <input type="hidden" name="_method" value="Delete">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </th>
                        </tr>
                    @endif
                    
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
 {{-- @endif --}}
@endsection

