<?php /** @noinspection ALL */
/**
 * This file contains the public/index.php file for project AWS-0002-A.
 *
 * File information:
 * Project Name: AWS-0002-A
 * Section Name: api
 * File Name: index.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 06/29/2024
 *
 * @noinspection ALL
 */
declare(strict_types=1);

use Controller\ApplicationController;
use Controller\DepartmentController;
use Controller\RoleAccessController;
use Controller\RoleController;
use Controller\UserAccessController;
use Controller\UserController;
use Gateway\ApplicationGateway;
use Gateway\DepartmentGateway;
use Gateway\RoleAccessGateway;
use Gateway\RoleGateway;
use Gateway\UserAccessGateway;
use Gateway\UserGateway;
use Root\AbstractController;
use Root\AbstractGateway;
use Root\Database;
use Root\Dotenv;

define("ROOT_PATH", dirname(path: __DIR__));
spl_autoload_register(callback: function (string $class_name) {
    require ROOT_PATH . "/src/" . str_replace(search: "\\", replace: "/", subject: $class_name) . ".php";
});
$dotenv = new DotEnv;
$dotenv->load(path: dirname(path: ROOT_PATH) . "/RWS-0001-A/config/.env");
set_exception_handler(callback: "\\Root\\ErrorHandler::handleException");
$path = parse_url($_SERVER["REQUEST_URI"], component: PHP_URL_PATH);
$parts = explode(separator: "/", string: $path);
$resource = $parts[1];
$id       = $parts[2] ?? null;
$action   = $parts[3] ?? null;
header(header: 'Content-Type: application/json; charset=UTF-8');
$database = new Database($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
switch ($resource) {
    case 'applications':
    case 'Applications':
        $gateway = new ApplicationGateway($database);
        $controller = new ApplicationController($gateway);
        break;
    case 'departments':
    case 'Departments':
        $gateway = new DepartmentGateway($database);
        $controller = new DepartmentController($gateway);
        break;
    case 'roleaccess':
    case 'RoleAccess':
        $gateway = new RoleAccessGateway($database);
        $controller = new RoleAccessController($gateway);
        break;
    case 'roles':
    case 'Roles':
        $gateway = new RoleGateway($database);
        $controller = new RoleController($gateway);
        break;
    case 'useraccess':
    case 'UserAccess':
        $gateway = new UserAccessGateway($database);
        $controller = new UserAccessController($gateway);
        break;
    case 'users':
    case 'Users':
        $gateway = new UserGateway($database);
        $controller = new UserController($gateway);
        break;
    default:
        http_response_code(response_code: 404);
        echo json_encode([
            "code" => '404',
            "message" => 'Page Not Found'
        ]);
        exit;
}
try {
    $result = $controller->processRequest($_SERVER['REQUEST_METHOD'], $id, $_GET);
    echo json_encode($result);
} catch (Exception $e) {
    http_response_code(response_code: 500);
    echo json_encode([
        "code" => '500',
        "message" => 'Internal Server Error'
    ]);
}