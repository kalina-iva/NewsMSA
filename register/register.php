<?php

session_start();
require "./mysqldb.php";
$msadb = new MyDB;
$msadb->connect();
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
 if (($name=='')or($email=='')or($username=='')or($password=='')or($confirm=='')) //если пользователь не ввел инфу, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
 if ($password!=$confirm) { exit ("Пароль и Пароль для подтверждения не совпадают"); }
 //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$name = stripslashes($name);
    $name = htmlspecialchars($name);
	$email = stripslashes($email);
    $email = htmlspecialchars($email);
	$confirm = stripslashes($confirm);
    $confirm = htmlspecialchars($confirm);
	 //удаляем лишние пробелы
	$username = trim($username);
    $password = trim($password);
	$name = trim($name);
	$email = trim($email);
	$confirm = trim($confirm);
	// проверка на существование пользователя с таким же логином
	$query = "SELECT UserId FROM users WHERE Login='$username'";
	$msadb->run ($query);
	$msadb->row ();
    if (!empty($msadb->data['UserId'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Вернитесь назад и введите другой логин.");
    }
	$query1 = "INSERT INTO users (Login,Pass,Name,Email) VALUES('$username','$password','$name','$email')";
	$msadb->run ($query1);
	

$_SESSION['username'] = $username;

header("Location: {$_SERVER['HTTP_ORIGIN']}");

?>