<?php

namespace App\Services\Impl;

use App\Http\Requests\GameStoreRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Response;

class GameServiceImpl implements GameService
{

    function findAllGames()
    {
        return GameResource::collection(Game::all());
    }

    function createGame(GameStoreRequest $request)
    {
        $game = Game::create($request->validated());
        return new GameResource($game);
    }

    function findById($id)
    {
        return new GameResource(Game::findOrFail($id));
    }

    function updateGame(GameStoreRequest $request, Game $game)
    {
        $game->update($request->validated());
        return new GameResource($game);
    }

    function deleteGame(Game $game)
    {
        $game->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
