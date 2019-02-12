<?php

session_start();
require "./mysqldb.php";
$msadb = new MyDB;
$msadb->connect();
$login = $_POST['user_login'];
$password = $_POST['user_password'];
 if (($login=='')or($password=='')) //если пользователь не ввел инфу, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
 //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	 //удаляем лишние пробелы
	$login = trim($login);
    $password = trim($password);
	// проверка на существование пользователя с таким же логином
	$query = "SELECT UserId FROM users WHERE Login='$login' AND Pass='$password'";
	$msadb->run ($query);
	$msadb->row ();
    if (!empty($msadb->data['UserId'])) 
	{
    //echo ("Вы успешно вошли.");
	$_SESSION['username'] = $login;
	header("Location: {$_SERVER['HTTP_ORIGIN']}");
    }
	else {exit("Вы ввели неправильный логин/пароль, вернитесь назад и попробуйте снова!"); }
	


?>