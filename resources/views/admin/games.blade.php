<html>
    <div>
        @foreach($games as $game)
            User: <a href="/admin/games/{{$game->user->id}}"> {{$game->user->name}} </a>
            <br>
            Value:
            {{$game->value}}
            <br>
            @foreach (explode('|', $game->autos) as $auto)
                {{$auto}}
                <br>
            @endforeach
            <hr>
        @endforeach
    </div>
</html>
