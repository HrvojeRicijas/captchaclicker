<html>
    <head>
        <title>Mis!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script type="text/javascript" src="{{ URL::asset('js/game/clicky.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/game/populate.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('js/game/cookies.js')}}"></script>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .autobox{
                flex: 1;
                display:inline-flex;
                flex-direction: column;
            }

            .buttonbox{
                flex: 1;
                display:inline-flex;
                flex-direction: row;
            }

            .buybutton{
                height: 100%;
                width: 75%;
            }

            .upgradebutton{
                height: 100%;
                width: 25%;
            }

            .autos{
                display: inline-flex;
                flex-direction: column;
                height: 100%;
                width: 30%;
            }

            .settingsbox{


            }

            .clickbuttonbox{
                display: inline-flex;
                height: 100%;
                width: 70%;
            }

        </style>
    </head>

    <body onload="startup()" onunload="save()">

        <div style="height: 100%; display: inline-flex; width: 100%; flex-direction: column">

            <div style="height: inherit; display: inherit; flex-direction: row; width: 100%">

                <div class="clickbuttonbox">
                    <input type="button" value="0" id="clickbutton" onclick="clickevent()" style="flex: 1">
                </div
                ><div id="autos"  class="autos">
                    <!--div class="autobox">
                        <div class="buttonbox" >
                            <button type="button" id="autobutton0" onclick="buyauto(0)" class="buybutton">0</button>
                            <button type="button" id="upgradebutton0" onclick="upgradeauto(0)" class="upgradebutton">0</button>
                        </div>
                            <label id="autoprice0">Price: 10</label>
                            <label id="autoproduction0">Production: 0</label>
                    </-div>

                    <div class="autobox">
                        <button type="button" value="0" id="autobutton1" onclick="buyauto(1)" class="buybutton">0</button>

                            <label id="autoprice1">Price: 100</label>
                            <label id="autoproduction1">Production: 0</label>

                    </div>

                    <div class="autobox">
                        <button type="button" value="0" id="autobutton2" onclick="buyauto(2)" class="buybutton">0</button>

                           <label id="autoprice2">Price: 500</label>
                           <label id="autoproduction2">Production: 0</label>

                    </div>

                    <div class="autobox">
                        <button type="button" value="0" id="autobutton3" onclick="buyauto(3)" class="buybutton">0</button>

                        <label id="autoprice3">Price: 2500</label>
                        <label id="autoproduction3">Production: 0</label>

                    </div-->
                </div>
            </div>
            <div class="settingsbox">
                <input type="button" value="Restart" id="restartbutton" onclick="restart()" style="flex: 1">
{{--                <input type="button" value="Save Locally" id="savebutton" onclick="save()" style="flex: 1">--}}
{{--                <input type="button" value="Save to Account" id="accountsavebutton" onclick="saveToAccount()" style="flex: 1">--}}
                @auth()
                    <input type='button' value='Save to Account' class="btn" onclick="accsave()"/>
                @endauth
                <input type='button' value='back' class="btn" onclick="document.location.href='/';"/>

            </div>
        </div>
    </body>

</html>
