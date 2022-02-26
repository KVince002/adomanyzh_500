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

}