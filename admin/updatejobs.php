<?php
require_once '../component/adminHeader.php';
require_once '../include/functions.php';
require_once '../include/dbconn.php';

if (isset($_SESSION["username"])) {
    if (isset($_POST["submit"])) {

        $oldCompanyName = $_POST["oldCompanyName"];
        $newCompanyName = $_POST["newCompanyName"];
        $jobname = $_POST["jobName"];
        $state = $_POST["state"];
        $jobdescription = $_POST["jobDescription"];

        require_once "../include/dbconn.php";
        require_once "../include/functions.php";

        editJob($conn, $newCompanyName, $jobname, $state, $jobdescription, $oldCompanyName);
    }
} else {
    header("location: ./login.php");
    exit();
}
?>

<main>
    <div class="mt-4 mx-1">
        <div class="hw-50 pb-1 m-auto">
            <h3>Internship Jobs</h3>
            <a href="./uploadjobs.php">
                <button type="button" class="btn btn-warning text-white">
                    <i class="fas fa-ban"></i> Back
                </button>
            </a>
            <form class="mt-4 border border-info p-4" action="./updatejobs.php" method="post">
                <h4>Update Jobs</h4>
                <div class="mb-3">
                    <label for="company" class="form-label">Old Company Name</label>
                    <input type="text" class="form-control" id="company" name="oldCompanyName" value="<?php echo htmlspecialchars($_GET['companyname']); ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">New Company Name</label>
                    <input type="text" class="form-control" id="company" name="newCompanyName" value="<?php echo htmlspecialchars($_GET['companyname']); ?>" />
                </div>
                <div class="mb-3">
                    <label for="jobname" class="form-label">Job Name</label>
                    <input type="text" class="form-control" id="jobname" name="jobName" value="<?php echo htmlspecialchars($_GET['jobname']); ?>" placeholder="Enter New UserName" />
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">State</label>
                    <input type="text" class="form-control" id="name" name="state" value="<?php echo htmlspecialchars($_GET['state']); ?>" />
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Job Description</label>
                    <input type="text" class="form-control" id="name" name="jobDescription" value="<?php echo htmlspecialchars($_GET['jobdescription']); ?>" />
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