document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("FBejelentkez").addEventListener("click", Bejelentkez);
    document.getElementById("FelhasznaloRegisztral").addEventListener("click", Regisztral);
})
function Bejelentkez() {
    console.log("Bejelentkez elindult");
    const email = document.getElementById("email").value;
    const jelsz = document.getElementById("jelsz").value

    //formData küldés
    const formData = new FormData();
    formData.append("funkcio", "Bejelentkez");
    formData.append("email", email);
    formData.append("jelsz", jelsz);
    fetch(baseUrl + "/ajax/FelhasznaloLoginPHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            //var bejl = JSON.parse(request);
            if (request === true) {
                alert("Sikertelen bejelentkezés");
            }
            else {
                //!még nem áll rendelkezésre
                window.location.replace(baseUrl + "");
            }
        })
}
function Regisztral() {
    console.log("Regisztral() fut");
    const vnev = document.getElementById("vnev").value;
    const knev = document.getElementById("knev").value;
    const bnev = document.getElementById("bnev").value;
    const email = document.getElementById("email").value;
    const telsz = document.getElementById("telsz").value;
    const jelsz = document.getElementById("jelsz").value

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
                alert("Sikeres regisztrálás!")
                //! valahogy az interfaceoldara jutás
                window.location.href = "";
            } else {
                //console.log(JSON.parse(Request));
                alert("Sikertelen regisztráció!")
            }
        })
    console.log("Regisztral() vége");
}