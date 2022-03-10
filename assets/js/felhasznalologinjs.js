document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("FBejelentkez").addEventListener("click", Bejelentkez);
    document.getElementById("FelhasznaloRegisztral").addEventListener("click", Regisztral);
})
function Bejelentkez() {
    console.log("Bejelentkez elindult");
    const email = document.getElementById("FEmail").value;
    console.log(email);
    const jelszo = document.getElementById("FJelszo").value
    console.log(jelszo);

    //formData küldés
    const formData = new FormData();
    formData.append("funkcio", "Bejelentkez");
    formData.append("FEmail", email);;
    formData.append("FJelszo", jelszo);
    fetch(baseUrl + "/ajax/FelhasznaloLoginPHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            var bejl = JSON.parse(request);
            console.log(bejl);
            if (bejl === true) {
                // console.log(request);
                window.location.href = baseUrl + "/felhasznalo_interface.php";
            }
            else {
                alert("Sikertelen bejelentkezés");
            }
        })
}
function Regisztral() {
    console.log("Regisztral() fut");
    const vnev = document.getElementById("vnev").value;
    console.log(vnev);
    const knev = document.getElementById("knev").value;
    console.log(knev);
    const bnev = document.getElementById("bnev").value;
    console.log(bnev);
    const email = document.getElementById("email").value;
    console.log(email);
    const telsz = document.getElementById("telsz").value;
    console.log(telsz);
    const jelsz = document.getElementById("jelsz").value
    console.log(jelsz);

    console.log("Bejövő adat kezelése: " + vnev + " ; " + knev + " ; " + bnev + " ; " + email + " ; " + telsz + " ; " + jelsz);
    const formData = new FormData();
    formData.append("funkcio", "FRegisztral");
    formData.append("vnev", vnev);
    formData.append("knev", knev);
    formData.append("bnev", bnev);
    formData.append("email", email);
    formData.append("telsz", telsz);
    formData.append("jelsz", jelsz);

    fetch(baseUrl + "/ajax/FelhasznaloLoginPHP.php", {
        method: "POST",
        body: formData,
    })
        .then(Response => Response.text())
        .then(request => {
            console.log(request);

            if (Request === true) {
                console.log(Request);
                alert("Sikeretelen regisztrálás!")
            } else {
                //console.log(JSON.parse(Request));
                alert("Sikeres regisztráció!")
                window.location.href = baseUrl + "/felhasznalo_interface.php";
            }
        })
    console.log("Regisztral() vége");
}