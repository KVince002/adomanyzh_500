document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("AdminBe").addEventListener("click", AdminBe);
});

function AdminBe() {
    const email = document.getElementById("AEmail").value;
    const jelsz = document.getElementById("AJelszo").value;
    var formData = new FormData();
    formData.append("funkcio", "AdminBe");
    formData.append("AEmail", email);
    formData.append("AJelszo", jelsz);

    fetch(baseUrl + "/ajax/AdminLoginPHP.php", {
        method: "POST",
        body: formData,
    })
    .then(Response => Response.text())
    .then(Request => {
        var bejl = JSON.parse(Request)
        console.log(bejl);

        if (bejl === true) {
            window.location.href = baseUrl + "/admin_interface.php";
        } else {
            alert("Sikertelen bejelentkezés");
        }
    })
}