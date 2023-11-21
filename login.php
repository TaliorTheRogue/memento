<?php
 try
 {
 $bdd = new PDO('mysql:host=localhost;dbname=memento;charset=utf8', 'root', '');
 }
 catch (Exception $e)
 {
 die('Erreur : ' . $e->getMessage());
 }

$accounts = 'SELECT email, password FROM users';
$response = $bdd->query($accounts);
$datas = $response->fetchAll();
foreach($datas as $data){
}


if($_SERVER['REQUEST_METHOD']=== 'POST'){
        if($data['email']===$_POST['email'] || $data['password']===$_POST['password']){
            $_SESSION['login']=true;
            header('location:index.php');
        }else{
            echo "Wrong email and/or password";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memento</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/login.css">
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
            <form method="post" action="login.php">
                <label for="email">Email address:</label>
                <input name="email" id="email" type="email" placeholder="Your email address">

                <label for="password">Password:</label>
                <input name="password" id="password" type="password" placeholder="Your password">

                <button type="submit">Login</button>
            </form>
        </main>
</body>
</html>