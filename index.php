<?php
declare(strict_types=1);

// Load Composer's autoloader
require 'vendor/autoload.php';

// Load Env vars
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//include all your model files here
require 'Model/Helper.php';
require 'Model/DatabaseConnection.php';
require 'Model/User.php';
require 'Model/Student.php';
require 'Model/Teacher.php';
require 'Model/Classgroup.php';

//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/InfoController.php';
require 'Controller/StudentController.php';
require 'Controller/TeacherController.php';
require 'Controller/ClassController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
if (isset($_GET['page']) && ($_GET['page'] === 'info')) {
    $controller = new InfoController();
} elseif (isset($_GET['page']) && $_GET['page'] === 'student') {
    $controller = new StudentController();
}elseif (isset($_GET['page']) && $_GET['page'] === 'teacher') {
    $controller = new TeacherController();
}elseif (isset($_GET['page']) && $_GET['page'] === 'class') {
    $controller = new ClassController();
}

$controller->render($_GET, $_POST);