@extends('layouts.app')

@section('content')
<a href="/feedbacks" class="btn btn-primary">Back</a>
    <h1>Edit Feedback</h1>
    {!! Form::open(['action' => ['FeedbacksController@update', $feedback->id], 'method' => 'FEEDBACK']) !!}
      <div class="form-group">
        {{Form::label('firstname', 'First Name')}}
        {{Form::text('firstname', $feedback->firstname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
      </div>
      <div class="form-group">
            {{Form::label('lastname', 'Last Name')}}
            {{Form::text('lastname', $feedback->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
          </div>
          <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $feedback->email, ['class' => 'form-control', 'placeholder' => 'eg : myemail@gmail.com'])}}
              </div>
              <div class="form-group">
                    {{Form::label('contact', 'Contact')}}
                    {{Form::text('contact', $feedback->contact, ['class' => 'form-control', 'placeholder' => 'eg : 0100000000'])}}
                  </div>
                  <div class="form-group">
                        {{Form::label('comment', 'Comment')}}
                        {{Form::textarea('comment', $feedback->comment, ['class' => 'form-control', 'placeholder' => 'Leave Your Comment'])}}
                      </div>
                      {{Form::hidden('_method','PUT')}}
 {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}                 
{!! Form::close() !!}
@endsection