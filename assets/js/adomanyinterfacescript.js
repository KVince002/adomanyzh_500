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
            //console.log(request);
            var szervadat = JSON.parse(request); //json data to let
            console.log(szervadat);

            //azonnali frissítések
            var MailLabel = document.getElementById("UjMailLabel");
            MailLabel.innerHTML = szervadat.email;
            var CimLabel = document.getElementById("UjCimLabel");
            CimLabel.innerHTML = szervadat.nev;
            var LeirasLabel = document.getElementById("UjLeLabel");
            LeirasLabel.innerHTML = szervadat.leiras;
            var BiztosTotliE = document.getElementById("Igen");
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
            var targyak = JSON.parse(request);
            console.log(targyak);

            //ha üres a tömb jön vissza
            if (targyak.length === 0) {
                var lista = document.getElementById("TargyMegjl");
                var NincsTargy = document.createElement("li");
                NincsTargy.innerHTML = "Nincs gyűjtés jelenleg"
                lista.appendChild(NincsTargy);
            } else {
                for (let i = 0; i < targyak.length; i++) {
                    var lista = document.getElementById("TargyMegjl");
                    var VanTargy = document.createElement("li");
                    VanTargy.innerHTML = targyak[i].cim;
                    VanTargy.id = targyak[i].id;
                    //jelölő négyzet
                    const jelolo = document.createElement("input");
                    jelolo.type = "checkbox";
                    jelolo.id = targyak[i].id;
                    jelolo.className = "mdl-checkbox__input";
                    lista.appendChild(VanTargy);
                    lista.appendChild(jelolo);
                }
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
                alert("Sikres frissítés");
            } else {
                console.log("Sikeretelen frissítés");
                alert("Sikertelen frissítés");
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