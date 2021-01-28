<script src="./js/js_fight.js" charset="utf-8" defer></script>
<link rel="stylesheet" href="./css/css_home.css">

<?php

spl_autoload_register(function($className){
    require_once "./model/classes/".$className.'.php';
});


$warrior = new Warrior("(Warrior)D'humble d'or", 14);
$mage = new Mage('(Mage)Gandalpho', 5);
$archer = new Archer('(Archer)Dégolas', 7);
//var_dump($warrior, $mage , $archer);
$round = "start";
$roundForPlayer = rand(1,2);

$player1 = $archer;
$player2 = $warrior;

$PAGE['title'] = 'Menu';
include './view/view_home.php';
