<html>
    <body>
       <div>
{{--           {{dump(explode("|", $game->autos))}}--}}
           <form method="POST" >
                @csrf

               @foreach(explode("|", $game->autos) as $auto)
                   {{substr($auto, 0, 5)}}:
                   <input type="text" name="auto[]" value="{{substr($auto, 6)}}">
                   <br>
               @endforeach
               value: <input type="text" name="value" value="{{$game->value}}">
               <input type="submit" value="Submit">
           </form>
       </div>
       <a href="/">Home</a>
    </body>
</html>
