console.log("conectado");

function loginAdm(event) {
  let email = document.querySelector("#email");
  let senha = document.querySelector("#senha");

  if (email == "adm2024@gmail.com" && senha == "2024@") {
    window.location.href = "adm.php";
    event.preventDefault();
    console.log("adm");
  }
}
