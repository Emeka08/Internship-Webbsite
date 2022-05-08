<?php

require_once "./component/header.php";

if (isset($_POST["submit"])) {
  $username = $_POST["email"];
  $password = $_POST["password"];

  require_once "./include/dbconn.php";
  require_once "./include/functions.php";

  if (emptyInputLogin($username, $password) !== false) {
    header("location: ./login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $username, $password);
}

?>
<main>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <a class="a" href="./login.php">
        <h2 class="h2 active">Log In</h2>
      </a>
      <a class="a" href="./signup.php">
        <h2 class="h2 inactive underlineHover">Sign Up</h2>
      </a>

      <!-- Icon -->
      <div class="fadeIn first p-2">
        <img src="./img/coou_logo.png" width="50" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="./login.php" method="post">
        <input type="text" id="email" class="fadeIn second" name="email" placeholder="Username / Email" />
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" />
        <div class="d-grid gap-2 d-block mx-5">
          <button class="btn btn-success mb-4 mt-2" type="submit" name="submit">Log In</button>
        </div>
      </form>

      <div class="errormsg">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
          } elseif ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login details</p>";
          }
        }
        ?>
      </div>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="a" class="underlineHover" href="./forgetpassword.php">Forgot Password?</a>
      </div>
    </div>
  </div>
</main>
<!-- Adda link to an onlline cv generator -->
<footer class="fixed-bottom p-3">
  <div class="text-center">
    <a class="text-decoration-none link-primary" href="mailto:aniemenacythia@gmail.com">aniemenacythia@gmail.com</a>
  </div>
</footer>
<script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
<script src="./js/script.js"></script>
</body>

</html>