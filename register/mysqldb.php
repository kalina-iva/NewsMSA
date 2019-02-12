<?php

// MYSQL
class MyDB 
{
var $dblogin = "root"; // ВАШ ЛОГИН К БАЗЕ ДАННЫХ
var $dbpass = ""; // ВАШ ПАРОЛЬ К БАЗЕ ДАННЫХ
var $db = "newsmsa"; // НАЗВАНИЕ БАЗЫ ДЛЯ САЙТА
var $dbhost="localhost";

var $link;
var $query;
var $err;
var $result;
var $data;
var $fetch;

function connect() {
$this->link = new mysqli($this->dbhost, $this->dblogin, $this->dbpass, $this->db);
$this->link->query('SET NAMES utf8');
}

function close() {
$this->link->close($this->link);
}

function run($query) {
$this->query = $query;
$this->result = $this->link->query($this->query);
}
function row() {
$this->data = $this->result->fetch_assoc();
}
function fetch() {
while ($this->data = $this->link->fetch_assoc($this->result)) {
$this->fetch = $this->data;
return $this->fetch;
}
}
function stop() {
unset($this->data);
unset($this->result);
unset($this->fetch);
unset($this->err);
unset($this->query);
}
}