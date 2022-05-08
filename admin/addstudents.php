<?php
require_once '../component/adminHeader.php';
require_once "../include/dbconn.php";
require_once "../include/functions.php";

if (isset($_SESSION["username"])) {

  if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];

    // Because this is the admin part there is no need to confirm password by the admin 
    $cpassword = "empty";

    if (emptyInputSignup($username, $firstname, $lastname, $password, $cpassword) !== false) {
      header("location: ./addstudents.php?error=emptyinput");
      exit();
    }

    if (invalidUsername($username) !== false) {
      header("location: ./addstudents.php?error=invalidusername");
      exit();
    }

    if (invalidEmail($email) !== false) {
      header("location: ./addstudents.php?error=invalidemail");
      exit();
    }

    if (usernameExist($conn, $username, $email) !== false) {
      header("location: ./addstudents.php?error=usernametaken");
      exit();
    }

    createUser($conn, $username, $firstname, $lastname, $email, $gender, $password);
  }
} else {
  header("location: ./login.php");
  exit();
};
?>

<main>
  <div class="my-4 mx-2">
    <div class="hw-50 pb-1 m-auto">
      <h3>Students Account</h3>
      <a href="./studentsacc.php">
        <button type="button" class="btn btn-warning text-white">
          <i class="fas fa-ban"></i> Cancel
        </button>
      </a>
      <div class="errormsg mt-2 text-center">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
          } elseif ($_GET["error"] == "invalidusername") {
            echo "<p>Choose a proper Username</p>";
          } elseif ($_GET["error"] == "usernametaken") {
            echo "<p>Username or E-mail already exist</p>";
          } elseif ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong, try again</p>";
          } elseif ($_GET["error"] == "invalidemail") {
            echo "<p>Invalid email address</p>";
          }
        }
        ?>
      </div>
      <form action="./addstudents.php" method="post" class="mt-4 border border-info p-4">
        <h4>Add New Student</h4>
        <div class="mb-3">
          <label for="userName" class="form-label">UserName</label>
          <input type="text" class="form-control" id="userName" name="username" />
        </div>
        <div class="mb-3">
          <label for="firstName" class="form-label">FirstName</label>
          <input type="text" class="form-control" id="firstName" name="firstname" />
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label">LastName</label>
          <input type="text" class="form-control" id="lastName" name="lastname" />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" />
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">Gender</label>
          <input type="text" class="form-control" id="gender" name="gender" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" />
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="submit" class="btn btn-success">
            <i class="far fa-save"></i> Save
          </button>
        </div>
      </form>

    </div>
  </div>
</main>

<?php
require_once '../component/footer.php';
?>