<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    @include('inc.navbar')
    
    @include('inc.message')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background : #2e6da4; color: white;">
                    Add Event to Calendar
                    </div>
                    <div class="panel-body">
                        <h1>
                            Task: Add Data
                        </h1>
                    <form method="POST" action="{{action('CalendarController@store')}}">
                    
                    
                    {{ csrf_field() }}
                    
                    {{-- <div class="form-group">
                        <label for="venue_id">Select Venue</label>
                        <select name="venue_id" id="venue_id">
                            <option value="null">Select Venue</option>
                            @foreach ($venue as $venuelist)
                                <option value="{{$venuelist->venue_id}}">{{$venuelist->venue_name}}</option>
                            @endforeach
                        </select>
                        <br>
                    </div> --}}

                    <label for="">Enter Event Name</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter the Event Name" /> <br>
                    
                    <label for="">Enter Event Colour</label>
                    <input type="color" class="form-control" name="color" placeholder="Enter the Event color" /> <br>
                    
                    <label for="">Enter Event Starting Date</label>
                    <input type="date" class="form-control" name="start_date" placeholder="Enter the Starting Date" /> <br>
                    
                    <label for="">Enter Event Ending Date</label>
                    <input type="date" class="form-control" name="end_date" placeholder="Enter the Ending Date" /> <br>
                    
                    <input type="submit" name="submit" class="btn btn-primary" value="Apply Event"/>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>