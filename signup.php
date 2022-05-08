<?php
require_once "./component/header.php";
require_once "./include/dbconn.php";
require_once "./include/functions.php";

if (isset($_POST["submit"])) {

  $username = $_POST["username"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $gender = $_POST["sex"];
  $password = $_POST["password"];
  $cpassword = $_POST["cPassword"];

  if (isset($_POST['radio'])) {
    $gender = $_POST['radio'];
  }

  if (emptyInputSignup($username, $firstname, $lastname, $password, $cpassword) !== false) {
    header("location: ./signup.php?error=emptyinput");
    exit();
  }

  if (invalidUsername($username) !== false) {
    header("location: ./signup.php?error=invalidusername");
    exit();
  }

  if (invalidEmail($email) !== false) {
    header("location: ./signup.php?error=invalidemail");
    exit();
  }

  if (passwordMatch($password, $cpassword) !== false) {
    header("location: ./signup.php?error=passworddon'tmatch");
    exit();
  }

  if (usernameExist($conn, $username, $email) !== false) {
    header("location: ./signup.php?error=usernametaken");
    exit();
  }

  createUser($conn, $username, $firstname, $lastname, $email, $gender, $password);
};

?>
<main>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <a class="a" href="./login.php">
        <h2 class="h2 inactive underlineHover">Log In</h2>
      </a>
      <a class="a" href="./signup.php">
        <h2 class="h2 active">Sign Up</h2>
      </a>

      <!-- Icon -->
      <div class="fadeIn first p-2">
        <img src="./img/coou_logo.png" width="50" id="icon" alt="User Icon" />
      </div>

      <div class="errormsg">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
          } elseif ($_GET["error"] == "invalidusername") {
            echo "<p>Choose a proper Username</p>";
          } elseif ($_GET["error"] == "passworddon'tmatch") {
            echo "<p>Password don't match</p>";
          } elseif ($_GET["error"] == "usernametaken") {
            echo "<p>Username already exist</p>";
          } elseif ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong, try again</p>";
          } elseif ($_GET["error"] == "invalidemail") {
            echo "<p>Invalid email address</p>";
          }
        }
        ?>
      </div>

      <!-- Login Form -->
      <form action="./signup.php" method="post">

        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" />
        <input type="text" id="firstname" class="fadeIn second" name="firstname" placeholder="Firstname" />
        <input type="text" id="lastname" class="fadeIn second" name="lastname" placeholder="Lastname" />
        <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email" />
        <p class="m-0 my-1 p-0">Gender</p>
        <div class="btn-group mb-3 d-block" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" name="sex" value="Male" id="btnradio1" autocomplete="off" />
          <label class="btn btn-outline-primary" for="btnradio1">Male</label>

          <input type="radio" class="btn-check" name="sex" value="Female" id="btnradio2" autocomplete="off" />
          <label class="btn btn-outline-primary" for="btnradio2">Female</label>
        </div>
        <input type="text" id="password" class="fadeIn second" name="password" placeholder="Password" />
        <input type="text" id="cPassword" class="fadeIn second" name="cPassword" placeholder="Confirm Password" />
        <div class="d-grid gap-2 d-block mx-5">
          <button class="btn btn-success mb-4 mt-2" type="submit" name="submit">Sign Up</button>
        </div>
      </form>

    </div>
  </div>
</main>
<?php
require_once "./component/footer.php";
?>