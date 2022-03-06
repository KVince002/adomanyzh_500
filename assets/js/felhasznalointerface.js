adatLeker();
function adatLeker(params) {
    console.log("adatok lekérésa");
    const formData = new FormData();
    formData.append("funkcio", "adatLeker");
    fetch(baseUrl + "/ajax/FelhasznaloInterfacePHP.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            const profilAdatok = JSON.parse(request);
            console.log(profilAdatok);

            //köszöntő név beállítása
            document.getElementById("nev").innerHTML = profilAdatok.keresztnev;

            //azonnali frissítések
            var MailLabel = document.getElementById("UjMailLabel");
            MailLabel.innerHTML = profilAdatok.email;
            var KerLabel = document.getElementById("UjKeresztnev");
            KerLabel.innerHTML = profilAdatok.keresztnev;
            var VezLabel = document.getElementById("UjVezeteknev");
            VezLabel.innerHTML = profilAdatok.vezeteknev;
            var TelLabel = document.getElementById("UjTelefonszam");
            TelLabel.innerHTML = profilAdatok.telefonszam;
            var BiztosTotliE = document.getElementById("Igen");
            var febatkaMost = document.getElementById("FabatkaMost");
            febatkaMost.innerHTML = profilAdatok.fabatka;

        })
}