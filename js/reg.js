pop = document.getElementById("pop");
pop_main = document.getElementById("pop_main");
logout = document.getElementById("logout");
butreg = document.getElementById("butreg");
butauto = document.getElementById("butauto");


$('#sub_reg').submit(function() {
    return false;
});

butreg.onclick = function() {
    autor = document.getElementById("autorization");
    rgstr = document.getElementById("registration");
    autor.style.display = "none";
    rgstr.style.display = "block";
    pop.style.top = "5px";
    pop.style.height = "95.5%";
}

butauto.onclick = function() {
    autor = document.getElementById("autorization");
    rgstr = document.getElementById("registration");
    autor.style.display = "block";
    rgstr.style.display = "none";
    pop.style.top = "25%";
    pop.style.height = "35%";
}