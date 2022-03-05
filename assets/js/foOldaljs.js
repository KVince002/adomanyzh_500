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
    btTomb.forEach((kartya)=> {
        //oldal megfogása
        const oldal = document.getElementById("Generalo");
        //kártya keret
        const kKeret = document.createElement("div");
        kKeret.className = "mdl-card";
        //Kártya cím
        const kCim = document.createElement("div");
        kCim.classList = "mdl-card__title";
        const kCimSzoveg = document.createElement("h2");
        kCimSzoveg.innerText = kartya.cim;
        kCimSzoveg.classList = "mdl-card__title-text";
        //kártya leiras
        const kLeiras = document.createElement("div");
        kLeiras.classList = "mdl-card__supporting-text";
        kLeiras.innerHTML = kartya.leiras;
        //kártya kep
        const kKep = document.createElement("div");
        kKep.classList = "mdl-card__media";
        const kKepImg = document.createElement("img");
        kKepImg.src = kartya.borito;
        //kartya gomb
        const kGomb = document.createElement("div");
        kGomb.classList = "mdl-card__actions"
        const kGombHivatkozas = document.createElement("a");
        /**
         * Az url változó alapján tudod leszedni az adatbázisból az adatokat.
         */
        kGombHivatkozas.href = baseUrl + `/targy_info.php?adomanytargyID=${kartya.id}`;
        const kGombButton = document.createElement("button");
        kGombButton.type = "button";
        kGombButton.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect KartyaOld"; //*a "KartyaOld" saját class, fel lesz használva
        kGombButton.innerHTML = "Megtekintés";
        kGombHivatkozas.appendChild(kGombButton);

        //json tömb hossza
        var btTombHossz = btTomb.length;

        oldal.appendChild(kKeret);
            //keret
        kKeret.appendChild(kCim);
        kKeret.appendChild(kKep);
        kKeret.appendChild(kLeiras);
        kKeret.appendChild(kGomb);
            //részletek
        kCim.appendChild(kCimSzoveg);
        kKep.appendChild(kKepImg);
        kGomb.appendChild(kGombHivatkozas);

        // for (let i = 0; i < btTombHossz; i++) {
        //     const element = btTomb[i];
        //     //összerakás
            
        // }
    });
}
