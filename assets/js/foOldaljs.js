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
    //oldal megfogása
    const oldal = document.getElementById("Generalo");
    //kártya keret
    const kKeret = document.createElement("div");
    kKeret.className = "mdl-card";
    //Kártya cím
    const kCim = document.createElement("div");
    kKeret.classList = "mdl-card__title";
    const kCimSzoveg = document.createElement("h2");
    kCimSzoveg.innerText = btTomb.cim;
    kCimSzoveg.classList = "mdl-card__title-text";
    //kártya leiras
    const kLeiras = document.createElement("div");
    kLeiras.classList = "mdl-card__supporting-text";
    kLeiras.innerHTML = btTomb.leiras;
    //kártya kep
    const kKep = document.createElement("div");
    kKep.classList = "mdl-card__media";
    const kKepImg = document.createElement("img");
    kKepImg.src = btTomb.borito;
    //kartya gomb
    const kGomb = document.createElement("div");
    kGomb.classList = "mdl-card__actions"
    const kGombButton = document.createElement("button");
    kGombButton.type = "button";
    kGombButton.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect";
    kGombButton.innerHTML = "Megtekintés";

    //összerakás
    oldal.appendChild(kKeret);
    //keret
    kKeret.appendChild(kCim);
    kKeret.appendChild(kKep);
    kKeret.appendChild(kLeiras);
    kKeret.appendChild(kGomb);
    //részletek
    kCim.appendChild(kCimSzoveg);
    kKep.appendChild(kKepImg);
    kGomb.appendChild(kGombButton);
}