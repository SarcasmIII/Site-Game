<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sidebar</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/style-admin.css" type="text/css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic" rel="stylesheet">
</head>
<body>
<div class="block">
    <div class="button button-hidden">
        <p> < </p>
    </div>
    <div class="button button-visible hidden">
        <p> > </p>
    </div>
    <div class="switch">
        <p>Изменить тему </p>
    </div>
    <div class="content">
        <ul class="choose tree">
            <li><a href="#" id="game">Игры</a>
                <ul class="game-m hidden">
                    <li><a href="#" class="pod-href ">Посмотреть все</a></li>
                    <li><a href="#" class="pod-href ">Создать игру</a></li>
                </ul>
            </li>
            <li><a href="#" id="post">Посты</a>
                <ul class="post-m hidden">
                    <li><a href="#" class="pod-href ">Посмотреть все</a></li>
                    <li><a href="#" class="pod-href ">Создать пост</a></li>
                </ul>
            </li>
            <li><a href="#" id="heroes">Персонажи</a>
                <ul class="heroes-m hidden">
                    <li><a href="listhero.php" class="pod-href ">Посмотреть всех</a></li>
                    <li><a href="addhero.php" class="pod-href ">Создать персонажа</a></li>
                </ul>
            </li>
            <!--<li><a href="#">Игры</a></li>-->
        </ul>
    </div>
</div>
