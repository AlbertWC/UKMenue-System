@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
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
                {{$maxevent}}
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
        <div class="row">
            <div class="card">
                @foreach ($venue as $venuelist)
                <script>var countervenue=0;</script>
                    <div class="card-header">
                        {{$venuelist->venue_name}}
                    </div>
                    <div class="card-body">
                       @foreach ($todayvenue as $eachvenue)
                           @if ($eachvenue->venue_id == $venuelist->venue_id)
                               @php
                                   $todayvenuecounter += 1
                               @endphp
                           @endif
                       @endforeach
                       @foreach ($date as $month)
                           @if ($month->venue_id == $venuelist->venue_id)
                               @php
                                   $venuemonthcounter += 1;
                               @endphp
                           @endif
                       @endforeach
                       @php
                          $rate =  $todayvenuecounter - (count($yesterday))
                       @endphp
                       This month: {{$venuemonthcounter}}
                       <br>
                       Today: {{$todayvenuecounter}}
                       <br>
                       Rate:
                       @if ($todayvenuecounter > count($yesterday))
                            increase : {{$rate}}
                        @else
                            decrease : {{$rate}}
                       @endif
                    </div>
                    @php
                    $venuemonthcounter = 0;
                    $todayvenuecounter = 0;
                   @endphp
                @endforeach
            </div>
        </div>

    </div>
    
</div>

@endsection
