<?php
session_start();
    if(!$_SESSION["user"]){
        header('Location: Auth.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <div class="user">
        <div class="container">
            <h1 class="hello">Hello, <strong><?=$_SESSION["user"]["login"]?></strong></h1>
            <button class="exit">Выйти</button>
        </div>
    </div>

    <script>
        var button = document.querySelector('button')
        button.onclick = function(){
            location.href = "Auth.php"
            session_destroy()
        }
    </script>
</body>
</html>