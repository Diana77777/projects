<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reg.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
    <title>Registration</title>
</head>
<body>
    <form action="Reg.php" method="POST" id="form">
   <div class="wrapper">
 <div class="container">
    <div class ="form_item">
      <label>name</label>
      <input class = "form_input" type="text" name="name" placeholder="Введите свое имя">
     </div>
     <div class ="form_item">   
        <label> login</label>
        <input class ="form_input "  type="text" name="login" placeholder="Введите свой логин">
     </div>
       <div class ="form_item">
        <label>email</label>
        <input class ="form_input" type="email" name="email" placeholder="Введите адрес своей почты">
     </div>   
     <div class ="form_item">
        <label>password</label>
        <input class ="form_input" type="password" name="password" placeholder="Введите пароль">
     </div>   
     <div class ="form_item">
        <label>confirm_password </label>
        <input class ="form_input" type="password" name="confirm_password" placeholder="Подтвердите пароль">
     </div>  
     <ul class="error__block"> 
        </ul>
     <div class="item">
             <input class="button__input" type="submit" name="button" value="Войти">
                </div>
      
        <p>
            У вас уже есть аккаунт? - <a href="Auth.php">авторизируйтесь</a>!
        </p>
        </div>
</div>
    </form>
    <script src="scripts/scriptReg.js"></script>
</body>
</html>