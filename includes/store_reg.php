<?php 
//Инициализируем сессию:
session_start();
// Соединяемся с Базой Данных используя файл config.php
include "config.php";
$do_register	= $data['do_register'];
$password_confirmation = trim( $data['password_confirmation'] );
$password = password_hash(( trim( $data['register_password'] ) ), PASSWORD_DEFAULT);
$email = trim( $data['register_email'] );
$name_reg = trim( $data['register_name'] );
// Проверка на ошибки
if( empty($name_reg) ) {
$_SESSION['no_names'] =	[	'no_name' => 'Введите Имя!'	]; 
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$_SESSION['no_emails'] =	[	'no_email' => 'E-mail указан не правильно'	];
}
if(		$password_confirmation != trim( $data['register_password'] )	) {
	$_SESSION['no_pass_conf_s'] = [ 'no_pass_conf' => 'Повторный пароль введен не верно!' ];
} else {
	if( empty($email) ) {
			$_SESSION['no_emails'] =	[	'no_email' => 'Введите E-mail!'	];
			}
	if( strlen(trim( $data['register_password'] )) < 6 ) {
			$_SESSION['no_passwords'] =	[	'no_password' => 'Введите пароль. Минимум - 6 символов!'	];
			header('Location: /register.php'); die();
			}
	if( !empty($name_reg) && !empty($email) && !empty($password) ) {
	// sql запрос к БД
	    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
	    $statement =  $pdo->prepare($sql); // Отправка запроса в БД
			$statement->execute([ ':name' => $name_reg, ':email' => $email, ':password' => $password ]);
			$_SESSION['reg'] = [ 'message_reg' => 'Регистрация прошла успешно!' ];
		}
	};

header('Location: /register.php'); die();