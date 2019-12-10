@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>Admin</strong> !
                </div>
                <div class="card-body">
                    <a href="/admin/feedback" action={{action('FeedbacksController@admindisplay')}} class="btn btn-primary">View Feebacks</a>
                    <a href="/calendars/approval" action={{action('ApprovalController@approval')}} class="btn btn-primary">Approval Events</a>
                </div>

            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-header ">
                Statistic 
            </div>
            <div class="card-body">
                Total Event Applied
                <br>
                {{$totalevent->id}}
            </div>
            <div class="card-body">
                Today application submitted
                <br>
                {{$counter}}                
            </div>
            <div class="card-body">
                Total Pending Event
                <br>
                {{count($haventapprove)}}
            </div>

        </div>
        
    </div>
    
</div>

@endsection
