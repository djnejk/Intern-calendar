<?php
ob_start();
session_start();



$s = rtrim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/\\');
$s = str_replace('/index.php/', '/', $s); // nahrazení /index.php/ za /


$lom = explode('/', $s);
switch ($s) {
  case '':
  case '/home':
    require('./homepage.php');
    break;
  case '/login':
    require('./login.php');
    break;
  case '/logout':
    require('./logout.php');
    break;

  default:
    $chyba_404 = 'obecne';
    require('./_stranky/404.php');
    break;
}
