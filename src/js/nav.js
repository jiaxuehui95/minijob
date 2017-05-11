
/* TODO Problème?*/
function checkName()
{
    document.getElementById("user").innerHTML = "";
    var name = eval(document.getElementById('email')).value;
    if (name.length > 30 || name.length < 1) {
        document.getElementById("user").innerHTML = "E-mail longueur entre 1 et 30 caractères！" ;
    }
}

function checkPassword()
{
    document.getElementById("psword").innerHTML = "";
    var name = eval(document.getElementById('password')).value;
    if (name.length > 16 || name.length < 4) {
        document.getElementById("psword").innerHTML = "Mot de passe longueur entre 4 et 16 caractères！" ;
    }
}

// pour afficher un menu sur petit écran
function menu_portable()
{
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Tabs
function openCity(evt, cityName)
{
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    var activebtn = document.getElementsByClassName("testbtn");
    for (i = 0; i < x.length; i++) {
        activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " w3-dark-grey";
}

var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click(); 