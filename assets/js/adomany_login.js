document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("AdomanyBejelentkez").addEventListener("click", beEllenoriz);
  document.getElementById("AdomanyRegisztral").addEventListener("click", Regisztral);
});

function beEllenoriz() {
  console.log("A 'beEllenoriz' függvény elindult");
  // Változók
  //* Stacnz Levenete csoportos gyakorlásából merítve
  let email = document.getElementById("AEmail").value;
  console.log(email);
  let jelszo = document.getElementById("AJelszo").value;
  console.log(jelszo);
  var formData = new FormData();
  formData.append("funkcio", "beEllenoriz");
  formData.append("AEmail", email);
  formData.append("AJelszo", jelszo);

  fetch(baseUrl + "/ajax/AdomanyLoginPHP.php", {
    method: "POST",
    body: formData,
  })
    .then(response => response.text())
    .then(request => {
      // console.log(request);
      var bejl = JSON.parse(request);
      console.log(bejl);
      if (bejl === true) {
        window.location.href = "";
      } else {
        console.log("Sikertelen bejelentkezés");
        alert("Sikertelen bejeletkezés");
      }
    });
}
function Regisztral() {
  console.log("A 'Regisztral' függvény elindult");
  //változók
  let nev = document.getElementById("Nev").value;
  console.log(nev);
  let leiras = document.getElementById("Leiras").value;
  console.log(leiras);
  let email = document.getElementById("Email").value;
  console.log(email);
  let jelszo = document.getElementById("Jelszo").value;
  console.log(jelszo);

  var formData = new FormData();
  formData.append("funkcio", "Regisztral");
  formData.append("Nev", nev);
  formData.append("Leiras", leiras);
  formData.append("Email", email);
  formData.append("Jelszo", jelszo);

  fetch(baseUrl + "/ajax/AdomanyLoginPHP.php", {
    method: "POST",
    body: formData,
  })
    .then(response => response.text())
    .then(request => {
      console.log(request);

      if (request === true) {
        console.log(request);
        console.log("Sikeres regisztráció");
        alert("Sikeres regisztráció");
      } else {
        console.log("Sikertelen regisztráció!");
        alert("Sikertelen regisztráció");
      }
    })
  console.log("A 'Regisztral' üggvény végetért");
}