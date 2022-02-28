betoltProfil();
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
            ////let szervadat = JSON.parse(request); //adatok json-ba
            ////console.log(szervadat);
            ////oldalEpit(szervadat);
            console.log(request);
        })
}

function oldalEpit(adatTomb) {
    console.log(asd);
}