<?php
header("HTTP/1.0 404 Not Found");
require_once '/var/www/html/vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('/var/www/html/templates');
$twig = new Environment($loader);

echo $twig->render('error.twig', ['time' => date('H:i:s')]);
