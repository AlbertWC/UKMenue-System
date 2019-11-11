@extends('layouts.app')

@section('content')
    <h1>Feedbacks</h1>
    @if (!Auth::guard('admin')->check())
        <a href="/feedbacks/create" class="btn btn-primary">Create Your Feedback</a>     
    @endif
    @if(count($feedback) > 0)
        @foreach($feedback as $feedbacks)
            <div class="well">
                @if (Auth::guard('web')->check())
                {{-- users --}}
                    <h3>Comment: <a href="/feedbacks/{{$feedbacks->id}}">{{$feedbacks->comment}}</a></h3>
                @else
                {{-- admin --}}
                    <h3>Comment: {{$feedbacks->comment}}</></h3>
                @endif
                <h5>By: {{$feedbacks->firstname}} {{$feedbacks->lastname}}</h5>
                <small>Written on {{$feedbacks->created_at}}</small>
                </div>
                <hr>
        @endforeach
        {{$feedback->links()}}
    @else

        <p>No feedback you created found</p>
    @endif
@endsection