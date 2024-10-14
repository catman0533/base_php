<?php

require_once '/var/www/html/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('/var/www/html/templates');
$twig = new Environment($loader);

echo $twig->render('base.twig', ['time' => date('H:i:s')]);
