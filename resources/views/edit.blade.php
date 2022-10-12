<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include('import.boot')
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<style>
    body {
        background: #c7b39b url({{asset('/storage/img/back.jpg')}});
        background-size: cover;
        color: #fff;
    }

    .mart {
        margin-left: 185px;
        margin-bottom: -20px;
    }

    td {
        padding: 30px;
    }

    svg:hover {
        color: #8e8985;
    }

    button.d2:hover, button.d1:hover {
        background-color: #8e8985;
        color: black;
    }

    button.d2 {
        background: rgb(52, 58, 64, 0.7);
        text-decoration: none;
        position: absolute;
        top: 90%;
        left: 84%;
    }

    button.d1 {
        background: rgb(52, 58, 64, 0.7);
        text-decoration: none;
        position: absolute;
        top: 90%;
        right: 84%;
    }

</style>
<body>
@include('import.navbar')
@if (session('status'))
    <h6 class="alert alert-success w-75 mart">{{ session('status') }}</h6>
@elseif(session('status2'))
    <h6 class="alert alert-danger w-75 mart">{{ session('status2') }}</h6>
@endif
<div class="container d-flex justify-content-center mt-4 w-75"
     style="height: 650px; border: 7px solid white;
     border-radius: 15px; border-color: rgba(108,117,125,0.7);
     background: rgb(52,58,64, 0.7);">
    <form class="container justify-content-center" action="{{ url('update/'.$game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group w-25">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" value="{{$game->name}}">
        </div>
        <p>Img</p>
        <input type="file" class="form" name="img" placeholder="">
        <div class="form-group w-85">
            <label for="exampleFormControlInput1">Discription</label>
            <input type="text" class="form-control" name="disc" value="{{$game->disc}}">
        </div>
        <div class="form-group w-25">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" class="form-control" name="price" value="{{$game->price}}">
        </div>
        <div class="form-group w-25">
            <label for="exampleFormControlInput1">Discount</label>
            <input type="text" class="form-control" name="discount" value="{{$game->discount}}">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
