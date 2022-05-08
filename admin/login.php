<?php
require_once '../component/adminHeader.php';

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once "../include/dbconn.php";
  require_once "../include/functions.php";

  if (emptyInputLogin($username, $password) !== false) {
    header("location: ./login.php?error=emptyinput");
    exit();
  }

  loginAdmin($conn, $username, $password);
}
?>
<main class="mt-5">
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <p class="mb-0 mt-4 text-primary">Administrator Login</p>

      <!-- Icon -->
      <div class="fadeIn first p-2">
        <img src="../img/coou_logo.png" width="50" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="./login.php" method="post" class="py-3">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" />
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" />
        <button class="btn btn-primary px-5 my-2" type="submit" name="submit">Log In</button>

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
      </form>
    </div>
  </div>
</main>
<?php
require_once '../component/adminFooter.php';
?>