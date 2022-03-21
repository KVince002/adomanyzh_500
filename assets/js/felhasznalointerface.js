adatLeker();
function adatLeker() {
    console.log("adatok lekérése");
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
            document.getElementById("nev").innerHTML = profilAdatok.Keresztnev;

            //azonnali frissítések és frissítések
            //mail
            var MailLabel = document.getElementById("UjMailLabel");
            MailLabel.innerHTML = profilAdatok.Email;
            const MailGomb = document.getElementById("MailFrissitGomb");
            MailGomb.addEventListener("click", UjMail);

            //kez és vez név
            var KerLabel = document.getElementById("UjKeresztnev");
            KerLabel.innerHTML = profilAdatok.Keresztnev;
            var VezLabel = document.getElementById("UjVezeteknev");
            VezLabel.innerHTML = profilAdatok.Vezeteknev;
            let KerVerGomb = document.getElementById("NevFrissitGomb");
            KerVerGomb.addEventListener("click", UjKerVer);

            //telefonszám
            var TelLabel = document.getElementById("UjTelefonszam");
            TelLabel.innerHTML = profilAdatok.Tel;
            const TelGomb = document.getElementById("TelFrissitGomb");
            TelGomb.addEventListener("click", UjTel);

            //jelenlegi fabatka
            var febatkaMost = document.getElementById("FabatkaMost");
            febatkaMost.innerHTML = profilAdatok.Fabatka;

            //becenév
            var BecLabel = document.getElementById("UjBecenev");
            BecLabel.innerHTML = profilAdatok.FelhNev;
            const BecGomb = document.getElementById("BecFrissitGomb");
            BecGomb.addEventListener("click", UjBec);

            //Jelszo
            const JelszGomb = document.getElementById("JelszoFrissitGomb");
            JelszGomb.addEventListener("click", UjJelsz);

            //fiók biztos körlése
            var BiztosTotliE = document.getElementById("Igen");

        })

    //függvények definiálása
    function UjMail() {
        console.log("UjMail elindult");
        const MailIn = document.getElementById("UjMail");
        console.log(MailIn.value);
        const formData = new FormData();
        formData.append("funkcio", "UjMailFunc");
        formData.append("UjMail", MailIn.value);
        fetch(baseUrl + "/ajax/FelhasznaloInterfacePHP.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.text())
            .then(request => {
                console.log(request);
                //const valasz = JSON.parse(request);
                if (request == true) {
                    alert("Sikertelen mentés!");
                } else {
                    alert("sikeres mentés");
                }
            })
    }
    function UjKerVer() {
        console.log("UjKerVer elindult");
        //input
        let KerIn = document.getElementById("UjKer");
        let VezIn = document.getElementById("UjVez");

        //! átmenetileg visszavonva
        //label
        // var KerLabel = document.getElementById("UjKeresztnev");
        // KerLabel.innerHTML = profilAdatok.keresztnev;
        // var VezLabel = document.getElementById("UjVezeteknev");
        // VezLabel.innerHTML = profilAdatok.vezeteknev;

        //! átmenetileg visszavonva
        //input ellenőrzés
        // if (KerIn.value == "") {
        //     KerIn.value = KerLabel.value;
        //     console.log(KerIn.value);
        // }
        // if (VezIn.value == "") {
        //     VezIn.value = VezLabel.value;
        //     console.log(KerIn.value);
        // }

        const formData = new FormData();
        formData.append("funkcio", "UjNevFunc");
        formData.append("UjKer", KerIn.value);
        formData.append("UjVez", VezIn.value);
        fetch(baseUrl + "/ajax/FelhasznaloInterfacePHP.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.text())
            .then(request => {
                console.log(request);

            });

    }
    function UjTel() {
        console.log("UjTel");
        const TelIn = document.getElementById("UjTel");
        const formData = new FormData();
        formData.append("funkcio", "UjTelszFunc");
        formData.append("UjTel", TelIn);
        fetch(baseUrl + "/ajax/FelhasznaloInterfacePHP.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.text())
            .then(request => {
                console.log(request);
                alert("Érték frissítve");
            });

    }
    function UjBec() {
        console.log("UjBec");
        const BecIn = document.getElementById("UjBec");
        const formData = new FormData();
        formData.append("funkcio", "UjBecFunc");
        formData.append("UjBec", BecIn);
        fetch(baseUrl + "/ajax/FelhasznaloInterfacePHP.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.text())
            .then(request => {
                console.log(request);
                if (request == "[]") {
                    alert("Sikeresen frissítve");
                } else {
                    alert("Sikertelen frissítés");
                }
            });

    }
    function UjJelsz() {
        console.log("UjJelszo");
        var JelszIn = document.getElementById("UjJelszo").value;
        const formData = new FormData();
        formData.append("funkcio", "UjJeszoFunc");
        formData.append("UjJelszo", JelszIn);
        fetch(baseUrl + "/ajax/FelhasznaloInterfacePHP.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.text)
            .then(request => {
                console.log(request);
                if (request == "[]") {
                    alert("Sikeres fissítés");
                } else {
                    alert("Sikertelen frissítés");
                }
            });

    }
}