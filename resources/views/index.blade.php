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
<div class="container d-flex justify-content-center mt-4 w-75"
     style="height: 650px; border: 7px solid white;
     border-radius: 15px; border-color: rgba(108,117,125,0.7);
     background: rgb(52,58,64, 0.7);">
    <table>
        <tr>
            <?php
            $max = 0;
            $cardCol = 0;
            ?>
            @foreach($allGame as $game)
                    <?php
                    if ($cardCol == 4) {
                        break;
                    }
                    if ($max < $game->id) {
                        $max = $game->id;
                    }
                    ?>
                <td>
                    <div class="card bg-secondary"
                         style="width: 200px; height: 230px; border-color: rgba(108,117,125,0.7);">
                        <img class="card-img-top"
                             style="border: 4px solid white; border-radius: 0px 0px 10px 10px; border-color: #8e8985; margin-bottom: -15px;"
                             src="{{$game->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-text mb-0">{{$game->name}}</h5>
                            <p class="card-text text-light mb-1" style="font-size: 14pt; font-weight: bold">
                                ${{$game->price}}</p>
                            <form action="details" method="get">
                                <input type="hidden" name="id" value="{{$game->id}}">
                                <button type="submit" class="btn btn-primary">Details</button>
                            </form>
                        </div>
                    </div>
                </td>
                    <?php $cardCol++; ?>
            @endforeach
            @for($i = $cardCol; $i != 4; $i++)
                <td>
                    <div style="width: 200px; height: 230px;">
                    </div>
                </td>
            @endfor
        </tr>
        <tr>
            <?php $cardCol = 0; ?>
            @foreach($allGame as $game)
                    <?php
                    if ($cardCol == 4) {
                        break;
                    }
                    if ($max >= $game->id) {
                        continue;
                    } else {
                        if ($max < $game->id) {
                            $max = $game->id;
                        }
                    }
                    ?>
                <td>
                    <div class="card bg-secondary"
                         style="width: 200px; height: 230px; border-color: rgba(108,117,125,0.7);">
                        <img class="card-img-top"
                             style="border: 4px solid white; border-radius: 0px 0px 10px 10px; border-color: #8e8985; margin-bottom: -15px;"
                             src="{{$game->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-text mb-0">{{$game->name}}</h5>
                            <p class="card-text text-light mb-1" style="font-size: 14pt; font-weight: bold">
                                ${{$game->price}}</p>
                            <form action="details" method="get">
                                <input type="hidden" name="id" value="{{$game->id}}">
                                <button type="submit" class="btn btn-primary">Details</button>
                            </form>
                        </div>
                    </div>
                </td>
                    <?php $cardCol++;
                    ?>
            @endforeach
            @for($i = $cardCol; $i != 4; $i++)
                <td>
                    <div style="width: 200px; height: 230px;">
                    </div>
                </td>
            @endfor
        </tr>
    </table>
    <form action="main.php" method="post">
        <input type="hidden" name="id" value="">
        <button class="d2 text-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </button>
    </form>
    <form action="main" method="get">
        <input type="hidden" name="cash" value="{{$max}}">
        <button class="d2 text-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </button>
    </form>
    <form action="main" method="get">
        <input type="hidden" name="cash" value="0">
        <button class="d1 text-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </button>
    </form>
</div>
</body>
</html>
A
