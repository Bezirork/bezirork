<?php 
// Соединяемся с Базой Данных используя файл config.php
include "config.php";

$do_post	= $_POST['do_post'];
$text = trim( $_POST['text'] );
$name = trim( $_POST['name'] );
$pubdate = date("Y-m-d H:i:s");
if( !empty($text) && !empty($name) ) {
	// sql запрос к БД
	    $sql = "INSERT INTO comments (author, text, pubdate) VALUES (:name, :text, :pubdate)";
	    $statement =  $pdo->prepare($sql); // Отправка запроса в БД
			$statement->execute([':name' => $name, ':text' => $text, ':pubdate' => $pubdate]);
		} else {
			echo "Пожалуйста, заполните все поля";
		}

	  	

header('Location: /')
 ?>