<?php 
    use \Slim\Slim;
    use \App\Controllers\ViewsController;
    require "../vendor/autoload.php";
    $app = new \Slim\Slim();
    $app->get('/cashier', function () {
        ViewsController::getView("formcashier","formcashier");
    });
    $app->run();
?>