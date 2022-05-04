<?php
include __DIR__ . '/../controllers/BalanceController.php';
$jokeController = new BalanceController();
$action = $_GET['action'] ?? 'home';
$page = $jokeController->$action();
$title = $page['title'];
$output = $page['output'];
include __DIR__ . '/../templates/layout/layout.html.php';