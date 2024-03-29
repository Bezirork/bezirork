<?php
// Настройки соединения с базой
$driver = 'mysql'; // тип базы данных, с которой мы будем работать
$host = 'localhost'; // альтернатива "127.0.0.1" - адрес хоста, в нашем случае локального 
$db_name = 'project_rork';	// имя базы данных
$db_user = 'root'; // имя пользователя для базы данных
$db_password = ''; // пароль пользователя
$charset = 'utf8'; // кодировка по умолчанию
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; /* Массив с дополнительными настройками подключения.
 В данном примере мы установили отображение ошибок, связанных с баой данных в виде исключений */
try {
	//Формируем строку DSN соединения и сохраняем в отдельную переменную 
 	$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
	// Cоединение с базой (создание обьекта PDO)
 	$pdo = new PDO($dsn, $db_user, $db_password, $options);
} catch (PDOException $e) {
		die("Не могу подключится к базе данных");
}
$data = $_POST;
