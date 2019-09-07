<html>
<head>
    <meta name="viewport" content="width=device-width">
    <title>Laravel Repositories and Services</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col-md-5">
        <h4 class="page-header">Laravel Repositories and Services </h4>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description </th>
                <th>Photo</th>
                <th>Number of seats</th>
            </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>{{ $room->title }}</td>
                        <td>{{ $room->description }}</td>
                        <td><img src="{{$room->getPhoto()}}" alt="photo"></td>
                        <td>{{ $room->number_of_seats }}</td>
                    </tr>
                </tbody>
        </table>
        <h1>Occupied seats</h1>
        @forelse($room->reservedSeats as $reservedSeat)
            <div>
                <li>{{$reservedSeat->customer_name}}</li>
                <li>{{$reservedSeat->customer_last_name}}</li>
                <li>{{$reservedSeat->phone_number}}</li>
                <li>{{$reservedSeat->reserved_at}}</li>
            </div>
        @empty
            <div>
                No reserved seats
            </div>
        @endforelse

    </div>
</div>
</body>
</html>
