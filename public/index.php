<?php 
    use \Slim\Slim;
    use \App\Controllers\ViewsController;
    require "../vendor/autoload.php";
    $app = new \Slim\Slim();
    $app->get('/', function () {
        $view = "formcashier";
        $ViewController = new ViewsController($view);
    });
    $app->run();
?>