<?php
require_once 'controller/controllers.php';
require_once 'controller/functions.php';
require_once 'config/config.php';

$url = $_GET['url'] ?? '/mvc-dyanmic';
switch ($url) {
    case 'roles':
        $type = $_GET['type'] ?? 0;
        RoleController::index();
        break;
    case 'add-data':
        $action = $_GET['action'] ?? '';
        if ($action === 'save') {
            StudentController::save();
        }
        StudentController::add();
        break;
    case 'show':
        $id = $_GET['id'] ?? 0;
        StudentController::show($id);
        break;
    case 'edit':
        $id = $_GET['id'] ?? 0;
        $action = $_GET['action'] ?? '';
        if ($action === 'save') {
            StudentController::update($id);
        }
        StudentController::edit($id);
        break;
    case 'rem':
        $id = $_GET['id'] ?? 0;
        StudentController::remove($id);
        break;
    case 'role-students':
        $type = $_GET['type'] ?? 0;
        RoleController::getRoles($type);
        break;
    default:
        // var_dump($url);
        // break;
        $action = isset($_GET['action']) ? $_GET['action'] : 'default';
        if ($action === 'restore') {
            StudentController::restore();
        }
        else if ($action === 'purge') {
            StudentController::purge();
        }
        else {
            StudentController::index();

        }
        break;
}

