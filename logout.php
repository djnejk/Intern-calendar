
<?php
ob_start();
session_start();

$_SESSION['uid'] = 0;
$_SESSION['admin'] = false;
$_SESSION['jmeno'] = null;
$_SESSION['prijmeni'] = null;
$_SESSION['email'] = null;
session_destroy();
session_start();
$_SESSION['toast'][] = ['icon' => 'success', 'title' => 'Úspěšně Odhlášeno'];

header("Location: /");
exit;