<html lang="en">
<head>
    <title>Image Intervention</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3 class="jumbotron">Create/upload image and its thumbnail</h3>
    {{--<form method="post" action="{{url('create-image')}}" enctype="multipart/form-data">--}}
        {!! Form::open(['method'=>'POST', 'action'=>'ImageController@store','enctype'=>'multipart/form-data', 'file'=>true]) !!}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input type="file" name="filename" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
            </div>
        </div>
        @if($image)
            <div class="row">
                <div class="col-md-8">
                    <strong>Original Image:</strong>
                    <br/>
                    <img height="80%" width="80%" src="/images/{{$image->filename}}" />
                </div>
                <div class="col-md-4">
                    <strong>Thumbnail Image:</strong>
                    <br/>
                    <img src="/thumbnail/{{$image->filename}}"  />
                </div>
            </div>
        @endif
    {{--</form>--}}
    {!! Form::close() !!}
</div>
</body>
</html>