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

            //dialg generálás
            dialogGeneral(betoltes);
            //generáló funkcio
            kartyaGeneral(betoltes);
        })
}

function dialogGeneral(btTomb) {
    btTomb.forEach(dialog);
    //* forEach ami építi az elemeket
    function dialog(item, index, tomb) {
        //oldal megfogása
        const oldal = document.getElementById("Generalo");

        //dialog keret
        var dialogKeret = document.createElement("dialog");
        //*egyedi id
        dialogKeret.id = tomb[index].CelID + "dia";
        dialogKeret.classList = "mdl-dialog";

        //dialog cím
        var dialogCim = document.createElement("h4");
        dialogCim.innerHTML = tomb[index].Cim;

        //dialog test ~ a részletes tartalmak ide kerülnek
        var dialogTest = document.createElement("p");
        dialogTest.classList = "mdl-dialog__content";
        dialogTest.innerHTML = "<b>Leírás</b><br><p>" + tomb[index].Leiras + "</p><br><p><b>A gyűjtés állása:</b></p><p><b>Cél: </b>" + tomb[index].Cel + "</p><p><b>Jelenleg: </b>" + tomb[index].Jelenleg + "</p>";

        //dialog műveletek
        var dialogMuvelet = document.createElement("div");
        dialogMuvelet.classList = "mdl-dialog__actions";

        //dialog bezár
        var dialogBezar = document.createElement("button");
        dialogBezar.innerHTML = "Bezárás";
        dialogBezar.id = tomb[index].CelID + "bezar";
        dialogBezar.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect";

        //Fizetési lehetőségek
        //minimum
        var minFizetes = document.createElement("button");
        minFizetes.innerHTML = "Minimum összeg fizetése (" + tomb[index].MinOsszeg + ")";
        minFizetes.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect";
        minFizetes.id = tomb[index].CelID + "bezar";
        minFizetes.onclick = function () {
            fizetes();
        }
        //saját összeg (mező)
        var sajatOsszegdiv = document.createElement("div");
        sajatOsszegdiv.classList = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label";
        //saját összeg (label)
        var sajatOsszeglabel = document.createElement("label");
        sajatOsszeglabel.classList = "mdl-textfield__label";
        sajatOsszeglabel.for = "SOErtek";
        sajatOsszeglabel.innerHTML = "Legalább: " + tomb[index].MinOsszeg;
        //saját összeg (érték)
        var sajatOsszegErtek = document.createElement("input");
        sajatOsszegErtek.classList = "mdl-textfield__input";
        sajatOsszegErtek.type = "text";
        sajatOsszegErtek.name = "SOErtek";
        sajatOsszegErtek.id = tomb[index].CelID + "ertek";
        //saját összeg (gomb)
        var sajatOsszegGomb = document.createElement("button");
        sajatOsszegGomb.id = tomb[index].CelID + "bevitel";
        sajatOsszegGomb.innerHTML = "Saját összeg fizetése";
        sajatOsszegGomb.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect";
        sajatOsszegGomb.onclick = function () {
            //fizetes
            fizetes();
        }

        //összeépítés
        oldal.appendChild(dialogKeret);
        dialogKeret.appendChild(dialogCim);
        dialogKeret.appendChild(dialogTest);
        dialogKeret.appendChild(sajatOsszegdiv);
        sajatOsszegdiv.appendChild(sajatOsszeglabel);
        sajatOsszegdiv.appendChild(sajatOsszegErtek);
        dialogKeret.appendChild(dialogMuvelet);
        dialogMuvelet.appendChild(sajatOsszegGomb);
        dialogMuvelet.appendChild(minFizetes);
        dialogMuvelet.appendChild(dialogBezar);

        //id ellenőrzés
        console.log(dialogKeret);

        //*álláspont fissítése
        // // let jelenlegiErt = tomb[index].Jelneleg;
        // // let celErt = tomb[index].cel;
        // // document.getElementById("allas").addEventListener("mdl-componentupgraded", function () {
        // //     this.MaterialProgress.setProgress(jelenlegiErt);
        // // });
    }
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
        kCimSzoveg.innerText = tomb[index].Cim;
        kCimSzoveg.classList = "mdl-card__title-text";

        //kártya leiras
        const kLeiras = document.createElement("div");
        kLeiras.classList = "mdl-card__supporting-text";
        kLeiras.innerHTML = tomb[index].Leiras;

        //kartya gomb
        const kGomb = document.createElement("div");
        kGomb.classList = "mdl-card__actions";

        const kGombButton = document.createElement("button");
        kGombButton.type = "button";
        kGombButton.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect KartyaOld"; //*a "KartyaOld" saját class, fel lesz használva
        kGombButton.id = tomb[index].CelID;
        kGombButton.innerHTML = "Megtekintés";
        kGombButton.onclick = function () {
            Reszlet(btTomb[index].id, btTomb);

            //*mdl ver
            var dialog = document.getElementById(btTomb[index].CelID + "dia");
            //console.log(dialog);
            if (!dialog.showModal) {
                dialogPolyfill.registerDialog(dialog);
            }
            dialog.showModal();

            //*dialog megnyitása
            dialog.display = "block";

            //*dialog bezárása
            var dialogButtonBezar = document.getElementById(btTomb[index].CelID + "bezar").addEventListener("click", function () {
                dialog.close();
            })
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
    const result = btTomb.filter(item => item.CelID == azonosito)[0];
    console.log(result);

    console.log("dialog generálás");
}

function fizetes() {
    console.log("fizetés elindult");
}
