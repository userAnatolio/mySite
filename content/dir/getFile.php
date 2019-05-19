<?php
//Функция ищет отрывки из файла.txt, разбивает их в массив и  добавляет их в отдельные файлы в одну дирректорию.
function generationFileContent($fileContent, $expression, $direct, $fileName) // файл контент txt, выражение, дирректория, имя файла
{
$content = file_get_contents($fileContent); // получаю основной контент...
preg_match_all($expression, $content, $arrStr); // с помощью регулярки разбиваю текст в массив.
for($i = 0; $i < count($arrStr[0]); $i++)
{
	file_put_contents($direct . '/' . $fileName . $i . '.txt', $arrStr[0][$i]); // добавил содержимое элемента в дирректорию
}
}
generationFileContent('text.txt', '#Задача(.*)НравитсяПоказать.список.оценивших#Uuis', 'htaccess/', 'task-');
//$content = file_get_contents('text.txt');
//preg_match_all('#Задача(.*)НравитсяПоказать.список.оценивших#Uuis', $content, $arrStr);
//var_dump($arrStr[1]);
?>
