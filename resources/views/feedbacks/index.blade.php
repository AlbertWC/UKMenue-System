@extends('layouts.app')

@section('content')
    <h1>Feedbacks</h1>
    @if (!Auth::guard('admin')->check())
        <a href="/feedbacks/create" class="btn btn-primary">Create Your Feedback</a>     
    @endif
    @if(count($feedback) > 0)
        @foreach($feedback as $feedbacks)
            <div class="well">
                <h3><a href="/feedbacks/{{$feedbacks->id}}">{{$feedbacks->comment}}</a></h3>
                <h5>{{$feedbacks->firstname}} {{$feedbacks->lastname}}</h5>
                <small>Written on {{$feedbacks->created_at}}</small>
                </div>
                <hr>
        @endforeach
        {{$feedback->links()}}
    @else

        <p>No feedback you created found</p>
    @endif
@endsection