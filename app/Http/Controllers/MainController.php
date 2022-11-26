<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Exception;
use http\Exception\BadMethodCallException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOption\None;

class MainController extends Controller
{

    public function index(Request $request)
    {
        if(isset($request->cash)){
            $allg = Game::all()->where('id', '>=', $request->cash);
            $user = Auth::user();
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
        try{
            $path = $request -> file('img')->store('img', 'public');
            Game::create([
                'name' => $request->name,
                'img' => $path,
                'disc' => $request->disc,
                'price' => $request->price,
                'discount' => $request->discount,
                'sold' => false
            ]);
            return redirect()->back()->with('status','Created successfull');
        }catch (Exception $e){
            return redirect()->back()->with('status2','No created');
        }
    }


    public function details($id)
    {
        $game = Game::find($id);
        return view('details', compact('game'));
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function update(Request $request, $id)
    {
        try {
            $game = Game::find($id);
            if ( $request->img != null) {
                $path = $request->file('img')->store('img', 'public');
                try{
                    unlink(public_path('/storage/' . $game->img));
                }catch (Exception $e){
            }

            }
            $game->name = $request->input('name');
            if($request->img != null) {
                $game->img = $path;
            }
            $game->disc = $request->input('disc');
            $game->price = $request->input('price');
            $game->discount = $request->input('discount');
            $game->update();
            return redirect()->back()->with('status','Edited successfull');
        }catch (Exception $e){
            return redirect()->back()->with('status2',$e);
        }
    }


    public function edit($id)
    {
        $game = Game::find($id);
        return view('edit', compact('game'));
    }


    public function delete($id)
    {
        $game = Game::find($id);
        try{
            unlink(public_path('/storage/'.$game->img));
        }catch (Exception $e){
            echo "Error";
        }
        $game -> delete();

        return redirect()->route('main');
    }
}
