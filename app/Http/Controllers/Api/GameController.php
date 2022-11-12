<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameStoreRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\GameService;
use App\Services\Impl\GameServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    public function index()
    {
        return GameServiceImpl::findAllGames();
    }

    public function store(GameStoreRequest $request)
    {
        return GameServiceImpl::createGame($request);
    }

    public function show($id)
    {
        return GameServiceImpl::findById($id);
    }

    public function update(GameStoreRequest $request, Game $game)
    {
        return GameServiceImpl::updateGame($request, $game);
    }

    public function destroy(Game $game)
    {
        return GameServiceImpl::deleteGame($game);
    }
}
