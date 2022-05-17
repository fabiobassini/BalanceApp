<?php
include __DIR__ . '/../controllers/BalanceController.php';
$jokeController = new BalanceController();

if (isset($_COOKIE['password'])) {
    $action = $_GET['action'] ?? 'home';
} else {
    $action = $_GET['action'] ?? 'login';
}

$page = $jokeController->$action();
$title = $page['title'];
$output = $page['output'];
include __DIR__ . '/../templates/layout/layout.html.php';
