<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(Request $request)
    {
        if(isset($request->cash)){
            $allg = Game::all()->where('id', '>=', $request->cash);
            return view('index', [
                'allGame' => $allg,
                'allgame' => Game::orderBy('id', 'DESC')]);
        }else {
            $allg = Game::all();
            return view('index', [
                'allGame' => $allg,
                'allgame' => Game::orderBy('id', 'DESC')]);
        }
    }

   public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        Game::create([
            'name' => $request->name,
            'img' => $request->img,
            'disc' => $request->disc,
            'price' => $request->price,
            'discount' => $request->discount,
            'sold' => false
        ]);

        return view('create');
    }


    public function details(Request $request)
    {
        $allg = Game::all()->where('id','==', $request->id);
        return view('details', [
            'allGame' => $allg,]);
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
