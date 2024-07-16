function verfSenha(event) {
  //Pegando os valores do campo input
  const senha = document.querySelector("#senha").value;
  const confirmsenha = document.querySelector("#confirmsenha").value;
  const errorSenha = document.querySelector(".errorSenha");

  if (senha != confirmsenha) {
    errorSenha.innerHTML = "As senhas devem ser iguais";
    //Previnindo a ação padrao de refresh do submit
    event.preventDefault();
  } else {
    errorSenha.innerHTML = "";
  }
}
