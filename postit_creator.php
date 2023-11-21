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
        $req = $bdd->prepare('INSERT INTO postits(title, content, date) VALUES(:title, :content, :date)');
        if($req->execute(array(
            ':title' => $_POST['title'],
            ':content' => $_POST['content'],
            ':date' => $_POST['date'],
            ))){
        echo 'Your postit has been created !';
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
    <link rel="stylesheet" href="assets/postit_creator.css">
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
            <form method="post" action="postit_creator.php">
                <label for="title">Titre:</label>
                <input name="title" id="title" type="text" placeholder="Your title">

                <label for="content">Content:</label>
                <textarea name="content" id="content" type="text" placeholder="Write here"></textarea>

                <label for="date">Date:</label>
                <input name="date" id="date" type="date" placeholder="Date">

                <button type="submit">Create postit</button>
            </form>
        </main>
        <footer>

        </footer>
</body>
</html>