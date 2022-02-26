document.addEventListener("DOMContentLoaded", function () {
    //document.getElementById("FBejelentez").addEventListener("click", Bejelentkez);
    document.getElementById("FelhasznaloRegisztral").addEventListener("click", Regisztral);
})
function Bejelentkez() {
    console.log("Bejelentkez() fut");
    const email = document.getElementById("email").value;
    console.log(email);
    const jelsz = document.getElementById("jelsz").value
    console.log(jelsz);

    //formData küldés
    const formData = new FormData();
    formData.append("funkcio", "Bejelentkez");
    formData.append("email", email);
    formData.append("jelsz", jelsz);
    fetch("felhasznalologinphp.php", {
        method: "POST",
        body: formData,
    })
        .then(Response => Response.text())
        .then(Request => {
            //ellenőrzés
            console.log(Request + " ~ " + Response);
            try {
                let bejl = JSON.parse(Request)
                console.log(bejl);

                //*létezik-e a felhasználó ellenőrzés
                if (!bejl == "Nincs Felhasználó") {
                    window.location.href = "../FelhasznalóInterface/felhasznalointerface.html"; //! lehet hogy át kell lépni eegy másik mappába
                } else {
                    alert("Hibás adatot adott meg a bejelentkezésnél! Próbálja meg újra!");
                }
            } catch (error) {

            }
        })
    console.log("Bejeletkez() vége");
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
        .then(Request => {
            console.log(Request);
            if (Request === true) {
                alert("Sikeres regisztrálás!")
                //// valahogy az interfaceoldara jutás
                window.location.href = "";
            } else {
                ////console.log(Response);
                console.log(Request); alert("Sikertelen regisztráció!")
            }
        })
    console.log("Regisztral() vége");
}