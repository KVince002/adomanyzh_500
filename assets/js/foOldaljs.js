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

    console.log("dialog generálás");

    //mdl dialog generálás 
    var DialogAlap = document.createElement("dialog");
    DialogAlap.classList = "mdl-dialog";
    DialogAlap.id = result;

    //mdl dialog bezárás
    var DialogBezar = document.createElement("button");
    DialogBezar.classList = "mdl-button close";
    DialogBezar.innerHTML = "Bezárás";

    //mdl dialog cím
    var DialogCim = document.createElement("h4");
    DialogCim.classList = "mdl-dialog__title";
    DialogCim.innerHTML = result.cim;

    //mdl dialog tartalom
    var DialogTartalom = document.createElement("div");
    DialogTartalom.classList = "mdl-dialog__content";

    // mdl dialog tatalom leírás
    var DialogTartalomLeiras = document.createElement("p");
    DialogTartalomLeiras.innerHTML = result.leiras;

    //generáló megtalálása
    var generalo = document.getElementById("Generalo");
    //*összerakás
    generalo.appendChild(DialogAlap);
    DialogAlap.appendChild(DialogCim);
    DialogAlap.appendChild(DialogTartalom);
    DialogTartalom.appendChild(DialogTartalomLeiras);
    DialogAlap.appendChild(DialogBezar);

    //!
    var dialog = document.querySelector('dialog');
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
}