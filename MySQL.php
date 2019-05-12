<?
	$mysqli = new mysqli ("localhost", "root", "", "test"); // Подключение в БД
	$mysqli -> query ("SET NAMES 'utf8'"); // Послали запрос (query) на кодировку

	$success = $mysqli -> query ("INSERT INTO `users` (`login`, `password`, `reg_date`) VALUES ('andrew', '".md5 (123)."', '".time()."' )"); // В переменную $success положили результут запроса (query) к БД ("Вставить в 'users' применяя только столбцы 'login' 'password' 'reg_date' Такие значения как 'andrew'(Имя пользователя) '123' (Используя кеширование PHP "M5") 'Время регистрации' (Используя функцию "time()", которая считает время с 1970 года и автоматически выдает настоящее время)")

	echo $success; // Вызываем переменную и ждем 1, как результат правильно запроса. Помним, что 2 одинаковых логина быть не может и в случае двух одинаковых запросов, второй окажется нулем

	for ($i = 1; $i < 10; $i++) {
		$success = $mysqli -> query (" INSERT INTO `users` (`login`, `password`, `reg_date`) VALUES ('$i', '".md5 ($i)."', '".time()."' )");
	} // Добавляем 9 пользователей, но все будут с именами растущими от 6 (VALUES ("$i") и паролями от 1 до 9)

	$mysqli -> query (" UPDATE `users` SET `reg_date` = '1' WHERE `login` = 'Admin' OR (`id`> 4 AND `id` < 8)"); // ОБНОВИТЬ вкладку "users" УСТАНОВИТЬ в 'reg_date' значение '123' ТОЛЬКО В 'users' с `id`=(> или <) 4 

	$mysqli -> query (" DELETE FROM `users` WHERE `id` IN (3, 5, 2) "); // ID только 3, 5, 2

	//$result_set = $mysqli -> query (" SELECT * FROM `users`"); // Выбрать *(ВСЁ) из `users`
	$result_set = $mysqli -> query (" SELECT * FROM `users` ORDER BY `login` ASC LIMIT 0, 2"); // ORDER BY выбрать по. ASC - Поумолчанию, DESC - По убыванию, LIMIT 0,2 (0 - С какого начать) (2 - сколько записей показать)

	$result_set = $mysqli -> query (" SELECT COUNT (`id`) FROM `users` WHERE `login` LIKE '%4%' "); // LIKE - Похож. Count - Счет чего-либо % - Задает диапазон "похожести"
	function printResult ($result_set) { // Функция вывода
		while ( ($row = $result_set -> fetch_assoc()) == true )  { // Все параметры (fetch_assoc()) из переменной $result_set будут переданы переменной $row
			print_r ($row); // Выводим весь массив
			//echo $row["login"]; // Выводим только 'login'ы всех пользователей
			echo "<br>";
		}
		echo "Count of records:  " . $result_set -> num_rows . "<br>---------------------"; // Выводим кол-во записей (num_rows)
	}

	printResult($result_set);
	$mysqli -> close (); // Передаем делегирования функции close (Т.е. закрыть соединение)
?>