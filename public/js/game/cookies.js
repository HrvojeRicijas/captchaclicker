
function load() {

    let cookies = document.cookie.split(";").filter(
        function (acookie) {
            return acookie.trim().slice(0, 4) == 'auto'
        }
    );
    let vCookie = document.cookie.split(";").filter(
        function (v) {
            return v.trim().slice(0, 2) == 'v=';
        }
    );

    cookies.sort();
    let val = 0;
    let j = 0;
    for (let i = 0; i < Math.min(cookies.length, autoamount.length); i++){
      //
       // window.alert(cookies[i])
        if (cookies[i].trim().slice(0, 4) == 'auto') {
            j = cookies[i].slice(cookies[i].indexOf('=') - 1, cookies[i].indexOf('='));
            val = cookies[i].slice(cookies[i].indexOf('=') + 1);
            autoamount[j] = val;
            autoprice[j] = Math.pow(priceincrease, autoamount[j]) * autoprice[j];
            document.getElementById(("autoprice" + j)).textContent = "Price: " + Math.floor(autoprice [j]);
            document.getElementById(("autoproduction" + j)).textContent = "Production: " + Math.floor(autoamount [j] * autopower[j] * 10) + " clicks per second";
            document.getElementById(("autobutton" + j)).textContent = autoamount [j];
        }
    }
    value = parseInt(vCookie[0].trim().slice(2), 10);
}
function save() {
    var cookievalue;
    for (var i = 0; i < autoamount.length; i++){
        cookievalue = "auto" + i + "=" + autoamount[i] + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
        document.cookie = cookievalue;
    }
    cookievalue = "v=" + Math.floor(value) + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
    document.cookie = cookievalue;
    document.cookie = "load=1" + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";

}

function accsave() {
    var cookievalue;
    for (var i = 0; i < autoamount.length; i++){
        cookievalue = "auto" + i + "=" + autoamount[i] + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
        document.cookie = cookievalue;
    }
    cookievalue = "v=" + Math.floor(value) + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
    document.cookie = cookievalue;
    document.cookie = "load=1" + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";

    document.location.href='/game/S';

}

function saveToAccount(){
    var cookievalue;
    for (var i = 0; i < autoamount.length; i++){
        cookievalue = "auto" + i + "=" + autoamount[i] + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
        document.cookie = cookievalue;
    }
    cookievalue = "v=" + Math.floor(value) + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
    document.cookie = cookievalue;

}
