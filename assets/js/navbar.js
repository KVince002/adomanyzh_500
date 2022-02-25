//!MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA MUDA 
document.addEventListener("DOMContentLoaded", function () {
    //eltűnő menü gombjai
    //felhasználologin
    document.getElementById("felhasznalologin").addEventListener("click", iranyFelhasznaloLogin);
    //adomanygyujtoknek
    document.getElementById("adomanygyujtoknek").addEventListener("click", iranyAdomanylogin);
    //rolunk
    document.getElementById("rolunk").addEventListener("click", iranyRolunk);
});

function iranyFelhasznaloLogin() {
    console.log("IF fut");
    window.location.href = "/FelhasznaloLogin/felhasznalologin.html";
}

function iranyAdomanylogin() {
    log("IA fut")
    window.location.href = "../AdomanyLogin/adomanylogin.html";
}

function iranyRolunk() {
    console.log("IR fut");
    window.location.href = "/Rolunk/rolunk.html";
}