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
            <form class="form-vertical" role="form" method="post" action="{{ route('rooms.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" name="description" placeholder="Content">{{old('title')}}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="photo">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" value="{{old('number_of_seats')}}" name="number_of_seats" placeholder="Content">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit Post</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
