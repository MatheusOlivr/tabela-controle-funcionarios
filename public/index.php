<?php 
    use \Slim\Slim;
    use \App\Controllers\ViewsController;
    require "../vendor/autoload.php";
    $app = new \Slim\Slim();
    $app->get('/operador', function () {
        ViewsController::getView("formcashier");
    });
    $app->get('/empacotador', function () {
        ViewsController::getView("formpacker");
    });
    $app->get('/carrinho', function () {
        ViewsController::getView("formcart");
    });
    $app->run();
?>