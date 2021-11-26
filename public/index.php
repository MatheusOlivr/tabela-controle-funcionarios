<?php 
    use \Slim\Slim;
    require "../vendor/autoload.php";
    $app = new \Slim\Slim();
    $app->get('/', function () {
        echo "HOME";
    });
    $app->run();
?>