<?php
require_once '../component/adminHeader.php';

if (isset($_SESSION["username"])) {

  if (isset($_POST["submit"])) {
    $company = $_POST["company"];
    $jobname = $_POST["jobname"];
    $state = $_POST["state"];
    $jobdescription = $_POST["jobdescription"];

    require_once "../include/dbconn.php";
    require_once "../include/functions.php";

    if (emptyInputJobLogin($company, $jobname, $state, $jobdescription) !== false) {
      header("location: ./addnewjob.php?error=emptyinput");
      exit();
    }

    if (NameExist($conn, 'internship_jobs', 'companyName', $company)) {
      header("location: ./addnewjob.php?error=companynametaken");
      exit();
    }
    addJob($conn, $company, $jobname, $state, $jobdescription);
  }
} else {
  header("location: ./login.php");
  exit();
}
?>

<main>
  <div class="my-4 mx-1">
    <div class="hw-50 pb-1 m-auto">
      <h3>Employer Account</h3>
      <a href="./uploadjobs.php">
        <button type="button" class="btn btn-warning text-white">
          <i class="fas fa-ban"></i> Cancel
        </button>
      </a>
      <form class="mt-4 border border-info p-4" action="./addnewjob.php" method="post">
        <h4>Add New Job</h4>
        <div class="mb-3">
          <label for="company" class="form-label">Company</label>
          <input type="text" class="form-control" id="company" name="company" />
        </div>
        <div class="mb-3">
          <label for="jobName" class="form-label">Job Name</label>
          <input type="text" class="form-control" id="jobName" name="jobname" />
        </div>
        <div class="mb-3">
          <label for="state" class="form-label">State</label>
          <input type="text" class="form-control" id="state" name="state" />
        </div>
        <div class="mb-3">
          <label for="jobDescription" class="form-label">Job Description</label>
          <input type="text" class="form-control" id="jobDescription" name="jobdescription" />
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="submit" class="btn btn-success">
            <i class="far fa-save"></i> Save
          </button>
        </div>
      </form>
      <div class="errormsg">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
          } elseif ($_GET["error"] == "companynametaken") {
            echo "<p>Company Name Already Exist</p>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</main>

<?php
require_once '../component/footer.php';
?>