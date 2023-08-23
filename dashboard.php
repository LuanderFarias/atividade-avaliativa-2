<?php
session_start();

if(!isset($_SESSION['nome'])){
    header("Location: index.php");
    exit();
}

$nome = $_SESSION['nome'];

if(isset($_POST['update'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($usuario->update($nome, $email, $senha)){
        echo "Dados atualizados com sucesso!";
    }else{
        echo "Erro ao atualizar, tente novamente";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        html {
            height: 90%;
        }
        body {
            margin: 60px;
            display: flex;
            height: 90%;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        #hero {
            display: flex;
            flex-direction: column;
            align-self: flex-start;
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
        #logout {
            width: 75px;
            height: 35px;
            border: none;
        }
        #logout:hover {
            cursor: pointer;
            background-color: #DC3545;
            color: white;
        }
        h2 {
            margin-top: 20px;
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
    <div>
        <div id="hero">
            <h1>Painel de controle</h1>
            <p>Seja bem-vindo(a) @<?php echo $nome; ?></p>
            <button onclick="location.href='index.php'" id="logout">Logout</button>
        </div>
    </div>
</body>
</html>