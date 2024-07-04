<?php


$host = "localhost";
$user = "root";
$password = "";
$db_name = "todo_list";

$db = new mysqli($host, $user, $password, $db_name);
if ($db->connect_error) {
    die("Kết nối thất bại: " . $db->connect_error);
}

require_once (__DIR__ . '/../app/controllers/WorkController.php');

// Khởi tạo model và controller
$workModel = new Work($db);
$workController = new WorkController($workModel);

// Định tuyến các yêu cầu
$action = $_GET['action'] ?? 'index';

if (method_exists($workController, $action)) {
    $workController->$action();
} else {
    $workController->index();
}
