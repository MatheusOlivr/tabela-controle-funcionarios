<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controllers\ViewsController;
use \App\Controllers\IndexController;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/operador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcashier");
});
$app->post('/operador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcashier");
    $data = $req->getParsedBody();
    IndexController::getMethodAddEmployeeByModel($data);
    IndexController::getTable($data);
});
$app->get('/empacotador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formpacker");
});
$app->post('/empacotador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formpacker");
    $data = $req->getParsedBody();
    IndexController::getMethodAddEmployeeByModel($data);
    IndexController::getTable($data);
});
$app->get('/carrinho', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcart");
});
$app->post('/carrinho', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcart");
    $data = $req->getParsedBody();
    IndexController::getMethodAddEmployeeByModel($data);
    IndexController::getTable($data);
});
$app->run();

?>
<!--<?php 
    use \Slim\Slim;
    require "../vendor/autoload.php";
    $app = new \Slim\Slim();
    $app->get('/operador', function () {
        
    });
    $app->get('/empacotador', function () {
        ViewsController::getView("formpacker");
    });
    $app->get('/carrinho', function () {
        ViewsController::getView("formcart");
    });
    $app->run();
?>-->