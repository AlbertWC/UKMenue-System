<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approval Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    @include('inc.navbar')
    @include('inc.message')
    <div class="container">
            <div class="header">
                <h1>Approval Events</h1>
            </div>
        <div class="jumbotron">
            <table class="table table-striped table-bordered table-hover">
                <thead class="head">
                    <h3>Lists</h3>
                    <tr class="warning">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($calendar as $calendarlist)
                <tbody>
                    @if ($calendarlist->approval == '0')
                    <tr>
                        <td>{{$calendarlist->id}}</td>
                        <td>{{$calendarlist->title}}</td>
                        <td>{{$calendarlist->start_date}}</td>
                        <td>{{$calendarlist->end_date}}</td>
                        <td>
                            {{Form::open(['action' => ['ApprovalController@updateevent', $calendarlist->id], 'method'=> 'POST'])}}
                                <input type="hidden" name="id" id="{{$calendarlist->id}}" value= {{$calendarlist->id}}>    
                                <button type="submit" class="btn btn-primary">Approve</button>
                            {{Form::close()}}
                        </td>
                        </tr>
                                       
                    @endif
                </tbody>
                @endforeach
            </table>
        </div>
    </div>       
        
</body>
</html>