<?php
session_start();
if(isset($_SESSION['connected'])){
}else{
    $_SESSION['connected']=false;
}

try
{
$bdd = new PDO('mysql:host=localhost;dbname=memento;charset=utf8', 'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
$query = 'SELECT * FROM postits';
$response = $bdd->query($query);

$datas = $response->fetchAll();

var_dump($_SESSION['connected']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memento</title>
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
                <?php if($_SESSION['connected']===false){ ?>
                    <a href="login.php" title="Login">Login</a>
                <?php }else{ ?>
                    <a href="logout.php" title="Logout">Logout</a>
                <?php } ?>
                <a href="register.php" title="Register">Register</a>
            </div>
        </nav>
    </header>
    <main>
        <div id="title_memento">
            <h2>Memento</h2>
            <?php if($_SESSION['connected']===true){ ?>
                <a href="postit_creator.php">Add Postit</a>
                <div id="postit_grid">
                    <?php foreach($datas as $data) {?>
                    <article>
                        <div class="postit_header">
                            <h3><?= $data['title'] ?></h3>
                            <button class="postit_delete">X</button>
                        </div>
                        <p><?= $data['content'] ?></p>
                        <div class="postit_footer">
                            <p><?= $data['date'] ?></p>
                        </div>
                    </article>
                    <?php } ?>
                </div>
            <?php }else{ ?>
                <p>You need to be logged in to view or create postits.</p>
            <?php } ?>
        </div>
    </main>
    <footer>

    </footer>
    
</body>

</html>