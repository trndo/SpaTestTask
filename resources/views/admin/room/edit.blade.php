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
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        <form class="form-vertical" role="form" method="post" action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="text" name="title" value="{{$room->title}}" class="form-control" placeholder="Title">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="5" name="description"  placeholder="Content">{{$room->description}}</textarea>
            </div>
            <div>
                <img src="{{$room->getPhoto()}}">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="number_of_seats" placeholder="Content" value="{{ $room->number_of_seats }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Submit Post</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

