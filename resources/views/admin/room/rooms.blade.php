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
                <th>Number</th>
                <th>Title</th>
                <th>Description </th>
                <th>Photo</th>
                <th>Number of places</th>
                <th>Action</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            @foreach($conferenceRooms as $room)
                <tbody>
                <tr>
                    <td>{{$room->id}}</td>
                    <td>{{$room->title}}</td>
                    <td>{{$room->description}}</td>
                    <td><img src="{{$room->getPhoto()}}" alt="photo"></td>
                    <td>{{$room->number_of_seats}}</td>
                    <td>
                        <button class="btn btn-success btn-xs" onclick="window.location.href ='{{ route('rooms.show', $room->id) }}'">Show room</button>
                    </td>
                    <td>
                        <button class="btn btn-success btn-xs" onclick="window.location.href ='{{ route('rooms.edit', $room->id) }}'"><span class="fa fa-pencil fa-fw"></span></button>
                    </td>

                    <form action="{{route('rooms.delete', $room->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" ><span class="fa fa-fw fa-trash"></span></button></p>
                        </td>
                    </form>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>
