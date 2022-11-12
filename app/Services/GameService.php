<?php

namespace App\Services;

use App\Http\Requests\GameStoreRequest;
use App\Models\Game;

interface GameService
{
    function findAllGames();
    function createGame(GameStoreRequest $request);
    function findById($id);
    function updateGame(GameStoreRequest $request, Game $game);
    function deleteGame(Game $game);
}
