<?php
$arrLinksMenu = [
 'aboutMe.php' => 'Главная',
 'amenities.php' => 'Услуги',
 'myWork.php' => 'Мои работы',
 'news.php' => 'Новости',
 'usefulArticle.php' => 'Полезные статьи',
 'contacts.php' => 'Контакты'
];

echo '<div><ul>';

foreach($arrLinksMenu as $key => $elem)
{
	echo '<li class="elementMenu" href="'.$key.'">' . $elem . '</li>';
}

echo '</ul></div>';
		
?>


<script src="jQuery/jQuery.js"></script>
<script src="JS/ajaxMenu.js"></script>


