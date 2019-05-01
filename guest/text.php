<?php $title = 'text' ?>
	<ol>
	
		<li>
			<h2>Начало</h2>
			<p>
			Создаем файл .htaccess (будет неплохо немного погуглить про этот файл, чтобы иметь представление для чего он существует)<br> 
			и подключаем в нем файл index.php вот так: <br> RewriteEngine on <br> RewriteRule .* index.php [L]
			</p>
		</li>
		<li>
			<h2>Добавляем папки пользователей</h2>
			<p>
			В эту же дирректорию добавляем папки для авторизованных пользователей и гостей.<br>
			В файле index.php добавляем условие для переменной $page с помощью регулярки.<br>
			Подключаем сессию и при условии, что сессия существует, а также при условии,<br>
			что файл существует, подключаем страницы с помощью include (используем переменую $page).<br>
			Смотрится это примерно вот так:<br><br>
			<span><b>
			if(file_exists('all/' . $page . '.php')) include 'all/' . $page . '.php';<br>
			else if(file_exists('auth/' . $page . '.php')) include 'auth/' . $page . '.php';<br>
			else if(file_exists('guest/' . $page . '.php')) include 'guest/' . $page . '.php';<br>
			else exit('Страница 404');<br>
			</b></span>
			</p>
		</li>
		<li>
			<h2>Файл с HTML и CSS</h2>
			<p>
			Создаю файл подключаемой HTML страницы, подключаю к странице стили, скрипты.<br>
			В каждом файле страницы будет храниться переменная $title с названием страницы.<br>
			Переменная $title будет подгружаться в тег <title> основного HTML<br>
			
			</p>
		</li>
		</li>
		<li>
			<h2>Проверка наличия страниц. Файл 404</h2>
			<p>
			Все страницы (файлы) проверяются на существование, перед его реализацией.<br>
			Реализовал файл 404 на случай отсутствия странички.<br>
			</p>
		</li>
		<li>
			<h2>База данных</h2>
			<p>
			Весь контент по возможности хранится в базе данных, подгружается через переход на страницу.
			</p>
		</li>
		
	
	</ol>