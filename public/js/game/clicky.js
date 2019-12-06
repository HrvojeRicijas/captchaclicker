var beginvalue = 0;
var beginclickpower = 1;
var beginautoamount = [0, 0, 0, 0, 0, 0];
var beginautopower = [0.1, 0.5, 2, 10, 50, 200];
var beginautoprice = [10, 100, 500, 2500, 100000, 1000000];
var beginpriceincrease = 1.05;


var timecounter = 0;

var value = parseInt(beginvalue.toString());
var clickpower = parseInt(beginclickpower.toString());
var autoamount = beginautoamount.slice(0);
var autopower = beginautopower.slice(0);
var autoprice = beginautoprice.slice(0);

var priceincrease = parseFloat(beginpriceincrease.toString());




function startup()
{
    let cookies = document.cookie.split(";").filter(
        function (acookie) {
            return acookie.trim().slice(0, 4) == 'load'
        }
    );
    let loadcookie;
    if (cookies[0]) {
         loadcookie = parseInt(cookies[0].trim().slice(5));
    }

    populateAutos();
    //window.alert(document.cookie.match(/^(.*;)?\s*v\s*=\s*[^;]+(.*)?$/))
    if (loadcookie) {load();}
    setInterval(function(){timeevent()}, 100);

}



function restart(){

    value = parseInt(beginvalue.toString());
    clickpower = parseInt(beginclickpower.toString());
    autoamount = beginautoamount.slice(0);
    autopower = beginautopower.slice(0);
    autoprice = beginautoprice.slice(0);
    updatevalue();
    updateautos();


}


function updatevalue()
{
    document.getElementById("clickbutton").value = Math.floor( value );
}

function updateautos(){
    for (let id = 0; id < autoamount.length; id++) {
        document.getElementById(("autoprice" + id)).textContent = "Price: " + Math.floor(autoprice [id]);
        document.getElementById(("autoproduction" + id)).textContent = "Production: " + Math.floor(autoamount [id] * autopower[id] * 10) + " clicks per second";
        document.getElementById(("autobutton" + id)).textContent = autoamount [id];
    }

}

function clickevent()
{

    value = value + clickpower;
    updatevalue();
}

function timeevent()
{
    let addtovalue = 0;
    timecounter += 0.1;
    for (let i=0; i<autoamount.length; i++){
        addtovalue = addtovalue + autoamount[i] * autopower[i];
    }

    value = value + addtovalue;
    //autochecker();
    updatevalue();
}

function buyauto(id){
    if (Math.floor(value) >= Math.floor(autoprice[id])){
        autoamount[id]++;
        value=value - Math.floor(autoprice[id]);
        autoprice[id] = autoprice[id] * priceincrease;
        document.getElementById(("autoprice" + id)).textContent = "Price: "+Math.floor(autoprice [id]);
        document.getElementById(("autoproduction" + id)).textContent = "Production: " + Math.floor(autoamount [id] * autopower[id] * 10) + " clicks per second";
        document.getElementById(("autobutton" + id)).textContent = autoamount [id];
    }
}

function autochecker(){
    for (let i = 0; i < autoamount.length; i++) {
        if (value>=autoprice [i]){
            document.getElementById(("autobutton" + i)).disabled = false;
        } else {
            document.getElementById(("autobutton" + i)).disabled = true;
        }
    }
}


function upgradeauto(){


}
