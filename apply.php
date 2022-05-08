<?php
require_once "./component/header.php";
require_once "./include/dbconn.php";
require_once "./include/functions.php";

if (isset($_SESSION["username"])) {
  if (isset($_POST["submit"])) {

    $companyName = $_POST["compnayName"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $resume = $_POST["resume"];

    saveApplication($conn, $companyName, $userName, $email, $gender, $resume);
  }
} else {
  header("location: ./login.php");
  exit();
}

?>
<main>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Icon -->
      <div class="fadeIn first p-2 mt-4">
        <img src="./img/coou_logo.png" width="50" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="./apply.php" method="post">
        <input type="text" id="compnayName" class="fadeIn second" name="compnayName" value="<?php echo htmlspecialchars($_GET["companyname"]); ?>" placeholder="Compnay Name" readonly />
        <input type="text" id="firstname" class="fadeIn second" name="userName" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" placeholder="Firstname" readonly />
        <input type="email" id="email" class="fadeIn second" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" placeholder="Email" readonly />
        <p class="m-0 my-1 p-0">Gender</p>
        <div class="btn-group mb-3 d-block" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" name="gender" id="btnradio1" value="Male" autocomplete="off" />
          <label class="btn btn-outline-primary" for="btnradio1">Male</label>

          <input type="radio" class="btn-check" name="gender" id="btnradio2" value="Female" autocomplete="off" />
          <label class="btn btn-outline-primary" for="btnradio2">Female</label>
        </div>
        <div class="mb-3">
          <label for="cv">Upload Resume</label>
          <label class="
                  d-inline-block
                  px-2
                  py-1
                  custom-file-upload
                  btn btn-outline-primary
                  border-primary
                "><input class="cv" type="file" name="resume" id="cv" /><i class="fas fa-upload"></i></label>
        </div>
        <button class="btn btn-primary mb-4 mt-2 px-5 fadeIn fourth" type="submit" name="submit">Apply</button>
      </form>
    </div>
  </div>
</main>
<?php
require_once "./component/adminFooter.php";
?>