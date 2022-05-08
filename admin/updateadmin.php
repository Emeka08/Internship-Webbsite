<?php
require_once '../component/adminHeader.php';
require_once '../include/functions.php';
require_once '../include/dbconn.php';

if (isset($_SESSION["username"])) {
  if (isset($_POST["submit"])) {

    $oldUsername = $_POST["oldUsername"];
    $newUsername = $_POST["newUsername"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    editAdmin($conn, $newUsername, $name, $password, $oldUsername);
  }
} else {
  header("location: ./login.php");
  exit();
}
?>

<main>
  <div class="mt-4 mx-1">
    <div class="hw-50 pb-1 m-auto">
      <h3>Administrators Account</h3>
      <a href="./administrator.php">
        <button type="button" class="btn btn-warning text-white">
          <i class="fas fa-ban"></i> Back
        </button>
      </a>
      <form class="mt-4 border border-info p-4" action="./updateadmin.php" method="post">
        <h4>Update Admin Account</h4>
        <div class="mb-3">
          <label for="userName" class="form-label">Old UserName</label>
          <input type="text" class="form-control" id="userName" name="oldUsername" value="<?php echo htmlspecialchars($_GET['username']); ?>" readonly />
        </div>
        <div class="mb-3">
          <label for="userName" class="form-label">New UserName</label>
          <input type="text" class="form-control" id="userName" name="newUsername" value="<?php echo htmlspecialchars($_GET['username']); ?>" placeholder="Enter New UserName" />
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($_GET['name']); ?>" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" />
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
require_once '../component/footer.php'
?>