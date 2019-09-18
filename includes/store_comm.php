<?php 
//Инициализируем сессию:
session_start();
// Соединяемся с Базой Данных используя файл config.php
include "config.php";
$do_post	= $data['do_post'];
$text = trim( $data['text'] );
$name = trim( $data['name'] );
$pubdate = date("Y-m-d H:i:s");
if( !empty($text) && !empty($name) ) {
	// sql запрос к БД
	    $sql = "INSERT INTO comments (author, text, pubdate) VALUES (:name, :text, :pubdate)";
	    $statement =  $pdo->prepare($sql); // Отправка запроса в БД
			$statement->execute([':name' => $name, ':text' => $text, ':pubdate' => $pubdate]);
			$_SESSION['messages'] = [ 'message' => 'Комментарий успешно добавлен!' ];
		} else {
			if( empty($name) ) {
			$_SESSION['no_names'] =	[	'no_name' => 'Введите Имя!'	]; 
			}
			if( empty($text) ) {
			$_SESSION['no_texts'] =	[	'no_text' => 'Введите текст комментария!'	];
			}
		}
header('Location: /'); die();