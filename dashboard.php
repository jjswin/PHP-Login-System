<?php 

    // ALLOW THE CONFIG 
    define('__CONFIG__',TRUE);
    //REQUIRE THE CONFIG
    require_once "inc/config.php"; 


ForceLogin();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>

  	<div class="uk-section uk-container">
          <?php   echo "hello world. Today is ";

          $user_id = $_SESSION['user_id']; 
          
          // $userid = $_POST['user_id'];

          echo $user_id; echo " ";
          echo date("Y m d");
          ?>

            <p>
                <a href="php_login_system/login.php">Login</a>
                <a href ="php_login_system/register.php">Register</a>
            </p>
        </div>
  	</div>
 <!-- jQuery is required -->
<?php require_once "inc/footer.php" ?>
   
     </body>
</html>