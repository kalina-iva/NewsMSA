<?php
session_start();
require "mysqldb.php";
$res = new MyDB;
$res->connect();
$res->run("SELECT NewsId, Headline, Text, Date FROM news ORDER BY Date DESC LIMIT 3");
$articles = array();
while($res->row())
{
    $articles[] = $res->data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MSA Главная</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</head>

<body>
<div id="wrapper">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light d-print" style="background-color: white;">
            <a class="logo" href="index.php" style="float:left; margin-top:2px; margin-right:50px;"><img src="logo.png" width="243" height="119"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">ГЛАВНАЯ<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="About_as/index.php">О САЙТЕ</a>
                </div>
            </div>
            <?php
    if (!isset($_SESSION['username'])) {
        ?>
            <div class="col-xs-3">
                <button class="btn btn-outline-danger" id="sign_up"><a href="../register/">Регистрация</a></button>
                <button class="btn btn-outline-danger" id="enter"><a href="../Auth/">Войти</a></button>
            </div>
            <?php
    }
    else
    {
        echo $_SESSION['username'];
    ?>
            <p>&nbsp;&nbsp;</p>
            <button class="btn btn-outline-danger" id="exit"><a href="exit.php">Выйти</a></button>
            <?php
    }
     ?>
        </nav>
    </header>
    <content>
        <div id="maindiv">
            <?php 
            foreach ($articles as $article): 
            echo '<div id="articles">
						<h4 class="headline"><b>'.
							$article['Headline'].
						'</b></h4>
						<p class="text">'.
							mb_strimwidth($article['Text'], 0, 400, "...").
						'</p>
						<p class="date">'.
							$article['Date'].
						'</p>
						<form method="post" action="btnClick.php">
							<button type="submit" class="btn" name="id" value="'.$article['NewsId'].'">Подробнее</button>
						</form>
					</div>';
            ?>
            <?php endforeach; ?>
        </div>
    </content>

    <footer>
        <div class="container">
           
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright © 2018. В рамках лабораторной работы по WEB-программированию</p>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>

</html>
