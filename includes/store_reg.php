<?php 
//Инициализируем сессию:
session_start();
// Соединяемся с Базой Данных используя файл config.php
include "config.php";
$do_register	= $data['do_register'];
$password_confirmation = password_hash(( trim( $data['password_confirmation'] ) ), PASSWORD_DEFAULT);
$password = password_hash(( trim( $data['password'] ) ), PASSWORD_DEFAULT);
$email = trim( $data['email'] );
$name_reg = trim( $data['name_reg'] );
if( !empty($name_reg) && !empty($email) && !empty($password) && !empty($password_confirmation)) {
	// sql запрос к БД
	    $sql = "INSERT INTO users (name, email, password, password_confirmation) VALUES (:name, :email, :password, :password_confirmation)";
	    $statement =  $pdo->prepare($sql); // Отправка запроса в БД
			$statement->execute([':name' => $name_reg, ':email' => $email, ':password' => $password, ':password_confirmation' => $password_confirmation]);
			$_SESSION['reg'] = [ 'message_reg' => 'Регистрация прошла успешно!' ];
		}; // else {
		// 	if( empty($name_reg) ) {
		// 	$_SESSION['no_names'] =	[	'no_name' => 'Введите Имя!'	]; 
		// 	}
		// 	if( empty($email) ) {
		// 	$_SESSION['no_emails'] =	[	'no_email' => 'Введите E-mail!'	];
		// 	}
		// 	if( empty($password) ) {
		// 	$_SESSION['no_passwords'] =	[	'no_password' => 'Введите пароль!'	];
		// 	}
		// 	if( empty($password_confirmation) ) {
		// 	$_SESSION['no_pass_conf_s'] =	[	'no_pass_conf' => 'Повторный пароль введён не верно!'	];
		// 	}
		// }
header('Location: /register.php'); die();