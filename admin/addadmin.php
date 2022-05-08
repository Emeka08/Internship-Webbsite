<?php
require_once '../component/adminHeader.php';

if (isset($_SESSION["username"])) {

  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    require_once "../include/dbconn.php";
    require_once "../include/functions.php";

    if (emptyAdminInputLogin($username, $password, $name) !== false) {
      header("location: ./addadmin.php?error=emptyinput");
      exit();
    }

    if (NameExist($conn, 'admins', 'username', $username)) {
      header("location: ./addadmin.php?error=usernametaken");
      exit();
    }

    addAdmin($conn, $username, $name, $password);
  }
} else {
  header("location: ./login.php");
  exit();
}
?>
<main>
  <div class="admin-main mt-4 mx-2">
    <div class="hw-50 pb-1 m-auto">
      <h3>Administrators Account</h3>
      <a href="./administrator.php">
        <button type="button" class="btn btn-warning text-white">
          <i class="fas fa-ban"></i> Cancel
        </button>
      </a>
      <form class="mt-4 border border-info p-4" action="./addadmin.php" method="post">
        <h4>Add New Admin</h4>
        <div class="mb-3">
          <label for="userName" class="form-label">UserName</label>
          <input type="text" class="form-control" id="userName" name="username" />
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" />
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="submit" class="btn btn-success" type="button">
            <i class="far fa-save"></i> Save
          </button>
        </div>
      </form>
      <div class="errormsg">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
          } elseif ($_GET["error"] == "invalidusername") {
            echo "<p>Choose a proper Username</p>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</main>

<?php
require_once '../component/adminFooter.php'
?>