betoltProfil();
//adományszervzet adatainak betöltése
function betoltProfil() {
    console.log("betolt fucntion elindult");
    //adomanygyujto szervezet adat lekérés
    var formData = new FormData();
    formData.append("funkcio", "AdoIntBe");
    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            var szervadat = JSON.parse(request); //json data to let
            console.log(szervadat);

            //azonnali frissítések
            var MailLabel = document.getElementById("UjMailLabel");
            MailLabel.innerHTML = szervadat.Email;
            var CimLabel = document.getElementById("UjCimLabel");
            CimLabel.innerHTML = szervadat.FelhNev;
            var LeirasLabel = document.getElementById("UjLeLabel");
            LeirasLabel.innerHTML = szervadat.Leiras;
            var BiztosTotliE = document.getElementById("Igen");
            var SzervNev = document.getElementById("nev");
            SzervNev.innerHTML = szervadat.FelhNev;

        })
}

betoltTargy()
//adományszervezet gyűjtése
function betoltTargy() {
    const formData = new FormData();
    formData.append("funkcio", "AdoTargyBe");
    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            var targyak = JSON.parse(request);
            console.log(targyak);

            //ha üres a tömb jön vissza
            if (targyak.length === 0) {
                var nincs = document.createElement("li");
                nincs.innerHTML = "Még nem indított semmilyen gyűjtést";
                document.getElementById("targyMegjl").appendChild(nincs);
            } else {
                for (let i = 0; i < targyak.length; i++) {
                    var lista = document.getElementById("TargyMegjl");
                    var VanTargy = document.createElement("li");
                    VanTargy.innerHTML = targyak[i].Cim;
                    VanTargy.CelID = targyak[i].CelID;
                    lista.appendChild(VanTargy);
                }
            }
            //statisztika
            var seged = "";
            for (let i = 0; i < targyak.length; i++) {
                seged += "<tr>";
                seged += "<td><input type='checkbox' class='TargyElem' data-id='" + targyak[i].CelID + "'>+</td>";
                seged += "<td>" + targyak[i].Cim + "</td>";
                seged += "<td>" + targyak[i].MinOsszeg + "</td>";
                seged += "<td>" + targyak[i].Cel + "</td>";
                seged += "<td>" + targyak[i].Jelenleg + "</td>";
                seged += "</tr>";
            }
            document.getElementById("tablaTest").innerHTML = seged;


        })
}

document.getElementById("TargyTorlesGomb").addEventListener("click", targyTorol);
function targyTorol() {
    let KijlTargyElemek = [];
    let TargyElemek = document.getElementsByClassName("TargyElem");
    for (let i = 0; i < TargyElemek.length; i++) {
        if (TargyElemek[i].checked) {
            KijlTargyElemek.push(TargyElemek[i].dataset.CelID);
        }
    }
    console.log(JSON.stringify(KijlTargyElemek));
    const formData = new FormData();
    formData.append("funkcio", "TargyTorol");
    formData.append("ids", JSON.stringify(KijlTargyElemek));
    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            alert("Kijelölt elemek törölve!");
            betoltTargy();
        })
}

//Új tárgy feltöltése
document.getElementById("TargyLetrehoz").addEventListener("click", TargyLetrehoz);
function TargyLetrehoz() {
    const LCim = document.getElementById("TargyNev").value;
    const LLeir = document.getElementById("TargyLe").value;
    const TCel = document.getElementById("TargyCel").value;
    const TMin = document.getElementById("TargyMin").value;

    const formData = new FormData();
    formData.append("funkcio", "TargyLetrehoz");
    formData.append("TargyNev", LCim);
    formData.append("TargyLe", LLeir);
    formData.append("TargyCel", TCel);
    formData.append("TargyMin", TMin);

    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    }).then(response => response.text())
        .then(request => {
            console.log(request);

            let sikeres = JSON.parse(request);
            console.log(sikeres);
            if (sikeres === true) {
                alert("Probléma adódótt!");
            } else {
                alert("Sikeres létrehozás!");
                betoltTargy();
            }
        })
}


document.getElementById("JelszoFrissitGomb").addEventListener("click", UjJelszo);
function UjJelszo() {
    //label megfogása
    let UjJelszoInput = document.getElementById("UjJelszo").value;
    console.log(UjJelszoInput);
    //formData
    const formData = new FormData();
    formData.append("funkcio", "UjJelszo");
    formData.append("FrissJelszo", UjJelszoInput);
    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            var siker = JSON.parse(request);
            if (!siker === true) {
                console.log("Sikeres frissítés");
                alert("Sikres frissítés");
            } else {
                console.log("Sikeretelen frissítés");
                alert("Sikertelen frissítés");
            }
        });
}

document.getElementById("LeFrissitGomb").addEventListener("click", UjLe);
function UjLe() {
    //label megfogása
    let UjLeirasInput = document.getElementById("UjLe").value;
    console.log(UjLeirasInput);
    //formData
    const formData = new FormData();
    formData.append("funkcio", "UjLeiras");
    formData.append("FrissLe", UjLeirasInput);
    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            var siker = JSON.parse(request);
            if (siker == "[]") {
                console.log("Sikeres frissítés");
                alert("Sikres frissítés");
            } else {
                console.log("Sikeretelen frissítés");
                alert("Sikertelen frissítés");
            }
        });
}

document.getElementById("CimFrissitGomb").addEventListener("click", UjCim);
function UjCim() {
    console.log("UjCim funkcio elindult");
    //label megfogása
    let UjCimInput = document.getElementById("UjCim").value;
    console.log(UjCimInput);
    //formData
    const formData = new FormData();
    formData.append("funkcio", "UjCim");
    formData.append("FrissCim", UjCimInput);
    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            var siker = JSON.parse(request);
            if (siker === true) {
                console.log("Sikeres frissítés");
                alert("Sikrtelen frissítés");
            } else {
                console.log("Sikeres frissítés");
                alert("Sikeres frissítés");
            }
        });
}

document.getElementById("MailFrissitGomb").addEventListener("click", UjMail);
function UjMail() {
    console.log("UjMail funkcio elindult");
    //label megfogása
    let UjMailInput = document.getElementById("UjMail").value;
    console.log(UjMailInput);
    //formData
    const formData = new FormData();
    formData.append("funkcio", "UjMail");
    formData.append("FrissMail", UjMailInput);
    fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            var siker = JSON.parse(request);
            if (siker === true) {
                console.log("Sikeres frissítés");
                alert("Sikres frissítés");
            } else {
                console.log("Sikeretelen frissítés");
                alert("Sikertelen frissítés");
            }
        });
}

function BiztosTorles() {
    console.log("Biztos törlés elindult");
    let TorolGomb = document.getElementById("Torol");
    TorolGomb.disabled = false;
    TorolGomb.addEventListener("click", function () {

        const formData = new FormData();
        formData.append("funkcio", "AFioktorles");
        fetch(baseUrl + "/ajax/AdomanyInterfacePHP.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.text())
            .then(request => {
                var siker = JSON.parse(request);
                if (siker === true) {
                    alert("Adományszervezete törölve lett a honlapunkról! Viszlát!");
                    window.location.href = "<?=BASEURL?>/fooldal.php?logout=true";
                } else {
                    alert("Adományszervezete a honlapunkról törlése sikertelen!");
                }
            });
    })
}