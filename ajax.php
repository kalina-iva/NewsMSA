<?php
//function getCategory() {
//    $category = $_POST['category'];
//    $content = file_get_contents("source.json", true);
//    $json = json_decode($content);
//    $quiz = $json->{'quiz'}->{$category};
//    echo json_encode($quiz);
//}
//
//$index = $_POST['index'];
//switch ($index){
//    case 1: getCategory(); break;
//}
require "mysqldb.php";

$res = new MyDB;
$res->connect();
// C какой статьи будет осуществляться вывод
$startFrom = $_POST['startFrom'];
// Получаем 3 статьи, начиная с последней отображенной
$res->run("SELECT NewsId, Headline, Text, Date FROM news ORDER BY Date DESC LIMIT {$startFrom}, 1");

// Формируем массив со статьями
$articles = array();
while($res->row())
{
    $articles[] = $res->data;
}

// Превращаем массив статей в json-строку для передачи через Ajax-запрос
echo json_encode($articles);
//echo $startFrom;