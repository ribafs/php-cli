<?php

use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\Builder\CliMenuBuilder;

require_once(__DIR__ . '/vendor/autoload.php');

$itemCallable = function (CliMenu $menu) {
    $nome = $menu->askText()
        ->setPlaceholderText('')
        ->ask();

    $cidade = $menu->askText()
        ->setPlaceholderText($nome->fetch() . ' em que cidade você mora?')
        ->ask();

    $result = $menu->askText()
        ->setPlaceholderText($nome->fetch() . ', ' . $cidade->fetch() . ' fica em que estado?')
        ->ask();

};

$menu = (new CliMenuBuilder)
    ->setTitle('Basic CLI Menu')
    ->addItem('Qual o seu nome?', $itemCallable)
    ->addItem('Second Item', $itemCallable)
    ->addItem('Third Item', $itemCallable)
    ->addLineBreak('-')
    ->setMarginAuto('-')
    ->build();

$menu->open();
