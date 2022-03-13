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

        //kartya gomb
        const kGomb = document.createElement("div");
        kGomb.classList = "mdl-card__actions";

        const kGombButton = document.createElement("button");
        kGombButton.type = "button";
        kGombButton.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect KartyaOld"; //*a "KartyaOld" saját class, fel lesz használva
        kGombButton.id = tomb[index].id;
        kGombButton.innerHTML = "Megtekintés";
        kGombButton.onclick = function () {
            Reszlet(btTomb[index].id, btTomb);
        }

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

    }
    var btTombHossz = btTomb.length;
    console.log(btTombHossz);
}

function Reszlet(azonosito, btTomb) {
    console.log("Gomb megnyomva");
    console.log(azonosito);

    //elem azonosítás
    const result = btTomb.filter(item => item.id == azonosito)[0];
    console.log(result);

    //modal generálás
    //modal keret
    const ModalKeret = document.createElement("dialog");
    ModalKeret.classList = "mdl-dialog";
    ModalKeret.id = "ModalKeret";

    //modal cim
    const ModalCim = document.createElement("div");
    ModalCim.classList = "mdl-dialog__title";
    ModalCim.id = "ModalCim";
    ModalCim.innerHTML = result.cim;

    //modal tartalom
    const ModalTartalom = document.createElement("div");
    ModalTartalom.classList = "modal-dialog__content";
    ModalTartalom.id = "ModalTartalom";
    //modal tartalom részlet
    var ModalTartalomReszlet = document.createElement("p");
    ModalTartalomReszlet.innerHTML = "<b>Név: </b><br></br><p>" + result.cim + "</p><br><b>Leírás: </b><br><p>" + result.leiras + "</p><br>";

    //modal gombok
    var ModalGombok = document.createElement("div");
    ModalGombok.classList = "mdl-dialog__actions mdl-dialog__actions--full-width";
    ModalGombok.id = "ModalGombok";
    //modal gombok bezár
    var ModalGombokBezar = document.createElement("button");
    ModalGombokBezar.id = "ModalGombokBezar";
    ModalGombokBezar.innerHTML = "Bezárás";

    //modal megjelenítése
    var dialog = document.querySelector("dialog");
    var showModalButton = document.getElementById(azonosito);
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    showModalButton.addEventListener('click', function () {
        dialog.showModal();
    });
    dialog.querySelector('#ModalGombokBezar').addEventListener('click', function () {
        dialog.close();
    });
}