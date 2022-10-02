<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include('import.boot')
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<style>
    body {
        background: #c7b39b url('https://www.xtrafondos.com/en/descargar.php?id=8827&resolucion=3840x2160');
        background-size: cover;
        color: #fff;
    }

    td {
        padding: 30px;
    }

    svg:hover{
        color: #8e8985;
    }

    button.d2:hover, button.d1:hover{
        background-color: #8e8985;
        color: black;
    }

    button.d2 {
        background: rgb(52,58,64, 0.7);
        text-decoration: none;
        position: absolute;
        top: 90%;
        left: 84%;
    }

    button.d1 {
        background: rgb(52,58,64, 0.7);
        text-decoration: none;
        position: absolute;
        top: 90%;
        right: 84%;
    }

</style>
<body>
@include('import.navbar')
@foreach($allGame as $game)
<div class="container d-flex justify-content-center mt-4 w-75" style="height: 650px; border: 7px solid white; border-radius: 15px; border-color: rgba(108,117,125,0.7); background: rgb(52,58,64, 0.7);">
    <div class="card" style=" margin-left: -1.5%; margin-right: 57%; height: 650px; width: 500px; background: rgb(52,58,64, 0); border: 0px solid white">
        <img class="card-img-top" style="border: 4px solid white; border-radius: 15px; border-color: #8e8985; width: 500px; height: 300px;" src="{{$game->img}}">
        <p style="margin-left: 30px; margin-top: 40px;">{{$game->disc}}</p>
    </div>
    <div style="position: absolute; left: 50%;">
        <h1>{{$game->name}}</h1>
        <h2>{{$game->price}}$</h2>
        <form action="addcart" method="post">
            <input type="hidden" name="id" value="">
            <button class="btn btn-primary">Add To Cart</button>
        </form>
    </div>
</div>
@endforeach
</body>
</html>
