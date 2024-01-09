<?php
include("conexao.php");

if (isset($_POST["email"]) || isset($_POST["senha"])) {

  if (strlen($_POST["email"]) == 0) {
    echo "preencha seu email";
  } else if (strlen($_POST["senha"]) == 0) {
    echo "preencha sua senha";
  } else {

    $email = $mysqli->real_escape_string($_POST["email"]);
    $senha = $mysqli->real_escape_string($_POST["senha"]);

    $sql_code = "SELECT = FROM usuários WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução no código SQL" . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {

      $usuario = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      header("Locatio: paniel.php");
    } else {
      echo "falha ao logar! e-mail ou senha incorretos";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h>Acessar Conta</h>
  <form action="" method="POST"></form>
  <p>
    <label>"e-mail"></label>
    <input type="text" nome="e-mail">
  </p>
  <p>
    <label>"Senha"></label>
    <input type="password" nome="senha">
  </p>
  <p>
    <button type="submit">Entrar</button>
  </p>
</body>

</html>