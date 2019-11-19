@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>User</strong> !
                    <div class="card-body">
                        <a href="/venues" class="btn btn-primary">View Venue</a>
                        <a href="/events" class="btn btn-primary">My Profile</a>
                        <a href="/feedbacks" class="btn btn-primary">Submit Feedback</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
