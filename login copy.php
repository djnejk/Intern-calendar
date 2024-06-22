<?php
//Zablokování přímé
if (count(get_included_files()) == 1) {
  // require(__DIR__ . '\_parts\secure.php');
  exit("Ne prostě... Já si nepřeju, aby sem někdo chodil.");
} //konec přímého 
?>
<?php
if (isset($_POST['emailjmeno']) && isset($_POST['password'])) {
  require($_SERVER['DOCUMENT_ROOT'] . '/db.php');
  $result = $conn->query("SELECT * FROM `users` WHERE `uzivatel` = '" . $_POST['emailjmeno'] . "' OR `email` = '" . $_POST['emailjmeno'] . "';");

  if ($result->num_rows > 0) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if (password_verify($_POST['password'], $row['heslo'])) {
      echo 'ano;';
      session_start();
      $_SESSION['uid'] = $row['id'];
      $_SESSION['jmeno'] = $row['jmeno'];
      $_SESSION['prijmeni'] = $row['prijmeni'];
      $_SESSION['toast'][] = ['icon' => 'success', 'title' => 'Úspěšně přihlášeno'];
      if (isset($_GET['return']) && $_GET['return'] != '') {
        header('Location: ' . $_GET['return']);
      } else {
        echo $_SESSION['jmeno'];
      }

      exit;
    } else {
      echo '<h1 style="color:red;">Špatné heslo nebo uživatelské jméno</h1>';
    }
  } else {
    echo '<h1 style="color:red;">Špatné heslo nebo uživatelské jméno</h1>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Přihlášení do administrace</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" href="/uploads/logo-librice-512x512-1.webp" sizes="32x32" />
  <link rel="icon" href="/uploads/logo-librice-512x512-1.webp" sizes="192x192" />
  <link rel="apple-touch-icon" href="/uploads/logo-librice-512x512-1.webp" />
  <meta name="msapplication-TileImage" content="/uploads/logo-librice-512x512-1.webp" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="_stranky/admin/Login_v1/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="_stranky/admin/Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="_stranky/admin/Login_v1/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="_stranky/admin/Login_v1/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="_stranky/admin/Login_v1/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="_stranky/admin/Login_v1/css/util.css">
  <link rel="stylesheet" type="text/css" href="_stranky/admin/Login_v1/css/main.css">
  <!--===============================================================================================-->
</head>

<body>
  <style>
    .wrap-login100 {

      background-color: #0d0d0d;

      box-shadow: 0px 0px 24px 6px rgba(0, 0, 0, 0.65);

      box-shadow: 0px 0px 24px 6px rgba(0, 0, 0, 0.65);

    }
  </style>
  <style>
    a,
    p,
    input,
    label {
      color: #fff !important
    }

    input {
      background-color: #3b3b3b !important
    }
  </style>
  <div class="limiter">

    <div class="container-login100">

      <div class="wrap-login100">

        <div style="width:100%;text-align:center;color:#fff">

          <h1>Obec Libřice</h1>

          <br>

        </div>

        <div class="login100-pic">

          <img src="/uploads/logo-librice-512x512-1.webp" alt="IMG">

        </div>

        <form class="login100-form validate-form" name="loginform" id="loginform" method="post">

          <span class="login100-form-title" style="color:#fff">

            ADMINISTRACE

          </span>

          <p>

          </p>
          <div class="wrap-input100 validate-input" data-validate="Špatný formát emailu">

            <input name="emailjmeno" class="input100" placeholder="Email" type="text" id="user_login" value="" size="20" autocapitalize="off">

            <span class="focus-input100"></span>

            <span class="symbol-input100">

              <i class="fa fa-envelope" aria-hidden="true"></i>

            </span>

          </div>

          <p></p>



          <div class="user-pass-wrap">

            <div class="wp-pwd">

              <div class="wrap-input100 validate-input" data-validate="Heslo je potřebné">

                <input class="input100" placeholder="Heslo" type="password" name="password" id="user_pass" value="" size="20">

                <span class="focus-input100"></span>

                <span class="symbol-input100">

                  <i class="fa fa-lock" aria-hidden="true"></i>

                </span>

                <!--<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Zobrazit heslo">

          <span class="dashicons dashicons-visibility" aria-hidden="true"></span>

        </button>-->

              </div>

            </div>

          </div>


          <p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> <label for="rememberme">Pamatovat si mě</label></p>

          <p class="submit">

          </p>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Přihlásit se
            </button>
          </div>

          <p></p>

        </form>

      </div>

    </div>

  </div>




  <!--===============================================================================================-->
  <script src="_stranky/admin/Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="_stranky/admin/Login_v1/vendor/bootstrap/js/popper.js"></script>
  <script src="_stranky/admin/Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="_stranky/admin/Login_v1/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="_stranky/admin/Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="_stranky/admin/Login_v1/js/main.js"></script>

</body>

</html>