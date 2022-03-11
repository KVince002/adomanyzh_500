Betoltes();
function Betoltes() {
    const formData = new FormData();
    formData.append("funkcio", "Betoltes");
    fetch(baseUrl + "/ajax/FoOldalPHP.php", {
        method: "POST",
        body: formData,
    })
        .then(Response => Response.text())//gyanús, hogy soem dobja be hogy text()
        .then(Request => {
            console.log(Request);
            var betoltes = JSON.parse(Request);

            //generáló funkcio
            kartyaGeneral(betoltes);
        })
}

function kartyaGeneral(btTomb) {
    btTomb.forEach(kartya);
    //itt nézem meg a gombokat
    var gombokTomb = [];

    //katya forEach
    function kartya(item, index, tomb) {
        //oldal megfogása
        const oldal = document.getElementById("Generalo");

        //kártya keret
        const kKeret = document.createElement("div");
        kKeret.className = "mdl-card";

        //Kártya cím
        const kCim = document.createElement("div");
        kCim.classList = "mdl-card__title";
        const kCimSzoveg = document.createElement("h2");
        kCimSzoveg.innerText = tomb[index].cim;
        kCimSzoveg.classList = "mdl-card__title-text";

        //kártya leiras
        const kLeiras = document.createElement("div");
        kLeiras.classList = "mdl-card__supporting-text";
        kLeiras.innerHTML = tomb[index].leiras;

        //kártya kep
        //!többet nem elérhető az adatbázsban
        // const kKep = document.createElement("div");
        // kKep.classList = "mdl-card__media";
        // const kKepImg = document.createElement("img");
        //kKepImg.src = kartya.borito;

        //kartya gomb
        const kGomb = document.createElement("div");
        kGomb.classList = "mdl-card__actions";

        //! átmenetileg visszavinva
        //const kGombHivatkozas = document.createElement("a");
        /**
         * Az url változó alapján tudod leszedni az adatbázisból az adatokat.
         */
        // kGombHivatkozas.href = baseUrl + `/targy_info.php?adomanytargyID=${kartya.id}`;


        const kGombButton = document.createElement("button");
        kGombButton.type = "button";
        kGombButton.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect KartyaOld"; //*a "KartyaOld" saját class, fel lesz használva
        kGombButton.id = tomb[index].id;
        kGombButton.innerHTML = "Megtekintés";
        kGombButton.onclick = function () {
            Reszlet(btTomb)
        }

        //!átmenetileg visszavonva
        // kGombHivatkozas.appendChild(kGombButton);

        //json tömb hossza

        console.log(btTombHossz);

        oldal.appendChild(kKeret);
        //keret
        kKeret.appendChild(kCim);
        //kKeret.appendChild(kKep);
        kKeret.appendChild(kLeiras);
        kKeret.appendChild(kGomb);
        //részletek
        kCim.appendChild(kCimSzoveg);
        //kKep.appendChild(kKepImg);
        kGomb.appendChild(kGombButton);

        //! átmenetileg visszavonva
        // kGomb.appendChild(kGombHivatkozas);

    }
    var btTombHossz = btTomb.length;
    console.log(btTombHossz);
}

function Megtekint(params) {
    let klikkelt = [];
    let KartyaGomb = document.getElementsByClassName("KartyaOld");
    for (let i = 0; i < KartyaGomb.length; i++) {
        const alap = KartyaGomb[i];
        Reszlet();
    }
}
