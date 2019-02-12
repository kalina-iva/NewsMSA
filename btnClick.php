<?php
session_start();

$id = $_POST['id'];
require "mysqldb.php";
$msadb = new MyDB;
$msadb->connect();
/*$msadb->run("SELECT * FROM Users");
$msadb->row();
$login = $msadb->data['Login'];
echo $login*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MSA Страница новости</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>
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
		<div class="newspage">
			<?php
				$msadb->run("SELECT Headline, Text, Date, Login FROM news, users WHERE NewsId=".$id." AND UserId=AuthorId");
				$msadb->row();
				echo '<h2><b>'.$msadb->data['Headline'].'</b><br></h2>';
				echo '<p>'.str_replace(PHP_EOL, '<br><br>', $msadb->data['Text']).'</p>';
				echo '<p><br><i>'.$msadb->data['Login'].' — '.$msadb->data['Date'].'</i></p>';
			?>
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
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
