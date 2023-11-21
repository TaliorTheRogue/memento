<?php
   try
   {
   $bdd = new PDO('mysql:host=localhost;dbname=memento;charset=utf8', 'root', '');
   }
   catch (Exception $e)
   {
   die('Erreur : ' . $e->getMessage());
   }

   if($_SERVER['REQUEST_METHOD']=== 'POST'){
       $req = $bdd->prepare('INSERT INTO users(email, username, password) VALUES(:email, :username, :password)');
       if($_POST['password'] === $_POST['confirmed_password']){
            if($req->execute(array(
                ':email' => $_POST['email'],
                ':username' => $_POST['username'],
                ':password' => $_POST['password'],
                ))){
            echo 'Your user account has been created !';
            }
       }else{
        echo "Your password is not identical";
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memento</title>
    <link rel="stylesheet" href="assets/register.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>
<body>
<header>
            <nav>
                <h1>Memento</h1>
                <div class="userlinks">
                    <a href="index.php" title="Home">Home</a>
                    <a href="login.php" title="Login">Login</a>
                    <a href="register.php" title="Register">Register</a>
                </div>
            </nav>
        </header>
        <main>
            <form method="post" action="register.php">
            <label for="email">Email address:</label>
                <input name="email" id="email" type="email" placeholder="Your email address">

                <label for="username">Username:</label>
                <input name="username" id="username" type="text" placeholder="Your username">

                <label for="password">Password:</label>
                <input name="password" id="password" type="password" placeholder="Your password">

                <label for="confirmed_passxord">Confirm password:</label>
                <input name="confirmed_password" id="confirmed_password" type="password" placeholder="Confirmed password">

                <button type="submit">Register</button>
            </form>
        </main>
</body>
</html>