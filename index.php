<?php
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['logar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if($usuario->logar($nome, $senha)){
        $_SESSION['nome'] = $nome;

        header("Location: dashboard.php");
        exit();
    }else{
        print "<script>alert('Credenciais invalidas')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
        }
        input{
            margin-bottom: 5px;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: 0.2s;
        }
        input:focus {
            outline: none;
            border: 2px solid #333;
            transform: scale(1.01);
        }
        label {
            margin-bottom: 3px;
        }
        button {
            padding: 10px;
            margin-top: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-weight: bold;
            transition: 0.2s;
        }
        button:hover{
            cursor: pointer;
            color: #333;
            background-color: #fff;
            border: 2px solid #333;
        }
        a {
            margin-top: 15px;
            text-decoration: none;
            color: #333;
            transition: 0.2s;
        }
        a:hover {
            text-decoration: underline;
            transform: scale(1.01);
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" placeholder="Coloque seu nome de usuario">
        <label for="Senha">Senha</label>
        <input type="password" name="senha" placeholder="Coloque sua senha">
        <button type="submit" name="logar">Login</button>
    </form>
    <a href="cadastrar.php">Clique aqui para criar uma conta</a>
</body>
</html>