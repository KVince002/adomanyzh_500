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
            let szervadat = JSON.parse(request); //json data to let
            console.log(szervadat);
            oldalEpit(szervadat);
        })
}

function oldalEpit(adatTomb) {
    //megkapott tömb ellenőrzése
    console.log(adatTomb);
    //body megfogáa
    var odlalTest = document.getElementsByTagName("body");
    //grid létrehozása
    const gridKeret = document.createElement("div");
    gridKeret.classList = "mdl-grid";
    //első sor
    //beálltások
    const beallitasok = document.createElement("div");
    beallitasok.classList = "mdl-card mdl-cell mdl-cell--8-col";

    //beállítások cím
    const beallitasokCim = document.createElement("div");
    beallitasokCim.classList = "mdl-card__title-text";
    //beállítások cim szöveg
    const beallitasokCSz = document.createElement("h3");
    beallitasokCSz.innerText = "Bállítások";

    //kártya szövege
    const beallitasokAlszoveg = document.createElement("div");
    beallitasokAlszoveg.classList = "mdl-card__supporting-text";
    //bállítások alcíme
    const beallitasokAlszovegLeiras = document.createElement("h5");
    beallitasokAlszovegLeiras.innerText("Egy adat átírásához csak kattintson a szövegmezőre és írja bele az új értéket, Majd kattitnson az elfogadás gombra!");
    //email div
    const beallitasokAlszovegEMAILDIV = document.createElement("div");
    //email speciális imput és label 
    const EMAILDIVmegadasDIV = document.createElement("div");
    EMAILDIVmegadasDIV.classList = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label";
    //jelenlegi email label
    const jelenlegEmail = document.createElement("label");
    jelenlegEmail.classList = "mdl-textfiled__label";
    jelenlegEmail.for = "UjMail";
    jelenlegEmail.innerText = adatTomb.email;
    //új email imput
    const UjMail = document.createElement("input");
    UjMail.classList = "mdl-textfiled__input";
    UjMail.type = "email";
    UjMail.id = "UjMail";
    UjMail.name = "UjMail";
    //firssít gomb
    //! hiányzó email frissítés függvény
    const emailFrissitGomb = document.createElement("button");
    emailFrissitGomb.type = "button";
    emailFrissitGomb.id = "MailFrissitGomb";
    emailFrissitGomb.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect";

    //jelszó div
    const beallitasokAlszovegJELSZODIV = document.createElement("div");
    //jelszo imput és lebel mező
    const JELSZODIVmegadasDIV = document.createElement("div");
    EMAILDIVmegadasDIV.classList = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label";
    //jelenlegi jelszo label
    const jelenlegJelszo = document.createElement("label");
    jelenlegLabel.classList = "mdl-textfiled__label";
    jelenlegLabel.for = "UjJelszo";
    jelenlegLabel.innerText = "új jelszó:";
    //új jelszo imput
    const UjJelszo = document.createElement("input");
    UjJelszo.classList = "mdl-textfiled__input";
    UjJelszo.type = "password";
    UjJelszo.id = "UjJelszo";
    UjJelszo.name = "UjJelszo";
    UjJelszo.maxLength = 249;
    //firssít gomb
    //! hiányzó jelszo frissítés függvény
    const jelszoFrissitGomb = document.createElement("button");
    emailFrissitGomb.type = "button";
    emailFrissitGomb.id = "JelszoFrissitGomb";
    emailFrissitGomb.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect";

    //új szervezet név div
    const beallitasokAlszovegUJNEVDIV = document.createElement("div");
    //új név imput és label
    const UJNEVmegadasDIV = document.createElement("div");
    EMAILDIVmegadasDIV.classList = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label";
    //jelenlegi név label
    const jelenlegNev = document.createElement("label");
    jelenlegLabel.classList = "mdl-textfiled__label";
    jelenlegLabel.for = "UjNev";
    jelenlegLabel.innerText = adatTomb.nev;
    //új név imput
    const UjNev = document.createElement("input");
    UjMail.classList = "mdl-textfiled__input";
    UjMail.type = "Text";
    UjMail.id = "UjNev";
    UjMail.name = "UjNev";
    //firssít gomb
    //! hiányzó név frissítés függvény
    const nevFrissitGomb = document.createElement("button");
    emailFrissitGomb.type = "button";
    emailFrissitGomb.id = "NevFrissitGomb";
    emailFrissitGomb.classList = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect";

    //Összerakás
    odlalTest.appendChild(gridKeret);
    gridKeret.appendChild(beallitasok);

    beallitasok.appendChild(beallitasokCim);
    beallitasokCim.appendChild(beallitasokCSz);

    beallitasok.appendChild(beallitasokAlszoveg);
    beallitasokAlszoveg.appendChild(beallitasokAlszovegLeiras);
    beallitasokAlszoveg.appendChild(beallitasokAlszovegEMAILDIV);
    beallitasokAlszoveg.appendChild(beallitasokAlszovegUJNEVDIV);

    beallitasokAlszovegEMAILDIV.appendChild(EMAILDIVmegadasDIV);
    EMAILDIVmegadasDIV.appendChild(jelenlegEmail);
    EMAILDIVmegadasDIV.appendChild(UjMail);
    EMAILDIVmegadasDIV.appendChild(emailFrissitGomb);

    beallitasokAlszovegJELSZODIV.appendChild(JELSZODIVmegadasDIV);
    JELSZODIVmegadasDIV.appendChild(jelenlegJelszo);
    JELSZODIVmegadasDIV.appendChild(UjJelszo);
    JELSZODIVmegadasDIV.appendChild(jelszoFrissitGomb);

    beallitasokAlszovegUJNEVDIV.appendChild(UJNEVmegadasDIV);
    UJNEVmegadasDIV.appendChild(jelenlegNev);
    UJNEVmegadasDIV.appendChild(UjNev);
    UJNEVmegadasDIV.appendChild(nevFrissitGomb);
}