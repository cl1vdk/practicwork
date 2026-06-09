<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Отправка данных в строке запроса</h2>
	
	<?php
		$array = [
			[
			"id"=>"1",
			"album_name"=>"Atom Heart Mother",
			"date"=>"10 октября 1970", 
			"label" =>"EMI, Harvest, Capitol",
			"status"=>"Золотой (USA)"
			],
			[
			"id"=>"2",
			"album_name"=>"Meddle",
			"date"=>"30 октября 1971",
			"label"=>"EMI, Harvest, Capitol",
			"status"=>"Платиновый (USA)"
			]
		];
		// 2. Преобразование массива в строку запроса
		$queryString = http_build_query($array);

		// 3. Обратное преобразование строки запроса в новый массив
		parse_str($queryString, $resultArray);

		// 4. Вывод исходного массива для проверки
		echo "--- Исходный массив ---\n";
		print_r($array);

		// 6. Вывод преобразованного массива для сравнения
		echo "\n--- Преобразованный массив ---\n";
		print_r($resultArray);
		

	?>
	

</body>
</html>