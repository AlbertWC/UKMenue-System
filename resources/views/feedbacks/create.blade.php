@extends('layouts.app')

@section('content')
<a href="/feedbacks" class="btn btn-primary">Back</a>
    <h1>Create Feedback</h1>
    {!! Form::open(['action' => 'FeedbacksController@store', 'method' => 'FEEDBACK']) !!}
      <div class="form-group">
        {{Form::label('firstname', 'First Name')}}
        {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
      </div>
      <div class="form-group">
            {{Form::label('lastname', 'Last Name')}}
            {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
          </div>
          <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'eg : myemail@gmail.com'])}}
              </div>
              <div class="form-group">
                    {{Form::label('contact', 'Contact')}}
                    {{Form::text('contact', '', ['class' => 'form-control', 'placeholder' => 'eg : 0100000000'])}}
                  </div>
                  <div class="form-group">
                        {{Form::label('comment', 'Comment')}}
                        {{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Leave Your Comment'])}}
                      </div>
 {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}                 
{!! Form::close() !!}
@endsection