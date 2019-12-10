<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function newGame(){
        setcookie("load", 0, time()+20);
        return redirect("/game");
    }

    public function loadFromAccount(){
        $game = (User::find(Auth::id())->game);
        $autos = explode("|", $game->autos);
        for ($i = 0; $i < sizeof($autos); $i++){
            $cookieDough = explode('=', $autos[$i]);
            setcookie($cookieDough[0], $cookieDough[1], time()+9000000);

        }

        setcookie("v", $game->value, time()+90000000);
        return redirect('/game');
    }

    public function loadFromMachine() {
        setcookie("load", 1, time()+20);
        return redirect("/game");
    }

    public function saveEditGame($id, Request $request){
        $autos = $request->all();
        $game = Game::find($id);
//intVal($autos['auto'][0]);

        collect($autos['auto'])->each(function ($item, $key){
            global $autocode;
            $autocode = $autocode."auto".$key."=".$item."|";}
        );
        global $autocode;
        $autocode=rtrim($autocode, "|");
        $game->autos = $autocode;
        $game->value = $autos['value'];
        $game->save();
        return redirect('/admin/games');
    }


    public function savegame()
    {

        $autos = collect($_COOKIE)->only(['auto0', 'auto1', 'auto2', 'auto3', 'auto4', 'auto5', 'auto6', 'auto7', 'auto8', 'auto9'])->sortKeys() ;
        $value = collect($_COOKIE)->only('v');
        $autos->each(function ($item, $key){
            global $autocode;
            $autocode = $autocode.$key."=".$item."|";}
        );
        global $autocode;
        $autocode=rtrim($autocode, "|");



        if (is_null(User::find(Auth::id())->game)){
            $game=new Game();
            $game->user_id = Auth::id();
            $game->value = $value['v'];
            $game->autos = $autocode;
            $game->save();
            return redirect("/game");
        } else {
            $game=User::find(Auth::id())->game;
            $game->value = $value['v'];
            $game->autos = $autocode;
            $game->save();
            return redirect("/game");
        }
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        //OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
    }


    public function showGames(){
        $games = Game::get();
        return view("admin.games", ['games'=>$games]);
    }




    public function editGame($id)
    {
        return view ('admin.game', ["game"=>Game::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
