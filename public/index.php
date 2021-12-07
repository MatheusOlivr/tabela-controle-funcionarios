<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controllers\ViewsController;
use \App\Models\Cashier;
use \App\Models\Cart;
use \App\Models\Packer;
use \App\Controllers\TableController;
use \App\Controllers\IndexController;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/', function (Request $req,  Response $res, $args = []) {
    echo "<h3>O QUE VOCÊ DESEJA ACESSAR:</h3>";
    echo "<br></br>";
    ViewsController::getView();
});
$app->post('/', function (Request $req,  Response $res, $args = []) {
    $post = $req->getParsedBody();
    echo "<h3>O QUE VOCÊ DESEJA ACESSAR:</h3>";
    echo "<br></br>";
    ViewsController::getView();
    IndexController::trucanteTables($post);
});
$app->get('/operador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcashier");
});
$app->post('/operador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcashier");
    $data = $req->getParsedBody();
    IndexController::getMethodAddEmployeeByModel($data);
    IndexController::getTable($data);
    IndexController::getTableByModel($data);
});
$app->get('/empacotador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formpacker");
});
$app->post('/empacotador', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formpacker");
    $data = $req->getParsedBody();
    IndexController::getMethodAddEmployeeByModel($data);
    IndexController::getTable($data);
    IndexController::getTableByModel($data);
});
$app->get('/carrinho', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcart");
});
$app->post('/carrinho', function (Request $req,  Response $res, $args = []) {
    ViewsController::getView("formcart");
    $data = $req->getParsedBody();
    IndexController::getMethodAddEmployeeByModel($data);
    IndexController::getTable($data);
    IndexController::getTableByModel($data);
});
$app->get('/tabela', function (Request $req,  Response $res, $args = []) {
    ViewsController::showAllTablesTogether();
});
$app->get('/teste', function (Request $req,  Response $res, $args = []) {
});
$app->run();

?>