<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<body>
    @include('inc.navbar')
    @include('inc.message')
    <form action={{action('CalendarController@update', $id)}} method="POST">
        {{ csrf_field() }}
    <div class="container">
        <div class="jumbotron" style="margin-top: 5%">
            <h1>Update your Data</h1>
            <hr>
            <input type="hidden" name="_method" value="Update">
            <div class="form-group">
                <label for="">Edit Event Name</label>
                <input type="text" class="form-control" name="title" placeholder="Enter the Event Name" value={{$calendar->title}} /> <br>
            </div>
            <div class="form-group">
                <label for="">Enter Event Colour</label>
                <input type="color" class="form-control" name="color" placeholder="Enter the Event color" value={{$calendar->color}} /> <br>      
            </div>
            <div class="form-group">
                <label for="">Enter Event Starting Date</label>
                <input type="date" class="form-control" name="start_date" placeholder="Enter the Starting Date" value={{$calendar->start_date}} /> <br>
            </div>  
            <div class="form-group">
                <label for="">Enter Event Ending Date</label>
                <input type="date" class="form-control" name="end_date" placeholder="Enter the Ending Date" value={{$calendar->end_date}}/> <br>      
            </div>
            {{method_field('PUT')}}
            <button type="submit" name="submit" class="btn btn-success">Update Data</button>

        </div>
    </div>
    </form>
</body>
</html>