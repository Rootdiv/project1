<?php
if (basename($_SERVER['REQUEST_URI']) == 'trips.php') {
  $title = 'Путешествия';
} elseif (basename($_SERVER['REQUEST_URI']) == 'contacts.php') {
  $title = 'Контакты';
} else {
  $title = 'Главная страница';
}?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta name="description" 
      content="Сайт тур-агентства создан в учебных целях, никакие услуги на сайте не продаются" />
    <link rel="shortcut icon" href="<?=PROJECT_URL;?>/img/icons/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?=PROJECT_URL;?>/css/styles.css" />
    <script src="<?=PROJECT_URL;?>/js/jquery-3.6.0.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=0d3fc543-baea-422c-aeeb-fb38008f8e8f"
      type="text/javascript"></script>
    <title>Проект 1. <?=$title;?></title>
  </head>
  <body>
    <div class="go-top">
      <b>&uarr;</b>
    </div>
    <div class="container">
