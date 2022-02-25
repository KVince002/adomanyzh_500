document.addEventListener("DOMContentLoaded", function () {
    function betolt;
})

function betolt() {
    console.log("betolt fucntion elindult");
    //adomanygyujto szervezet adat lekérés
    var formData = new FormData();
    formData.append("funkcio", "szervleker");
    fetch("adomanyinterfacephp.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(request => {
            try {
                console.log(request);
                let szervadat = JSON.parse(request); //adatok json-ba
                console.log(szervadat);
            } catch (error) {
                console.log("Hiba tőrtént " + error);
            }
        })
}