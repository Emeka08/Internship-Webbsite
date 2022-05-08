<?php
require_once '../component/adminHeader.php';
require_once '../include/functions.php';
require_once '../include/dbconn.php';

if (isset($_SESSION["username"])) {
    if (isset($_POST["submit"])) {

        $oldCompanyName = $_POST["oldCompanyName"];
        $newCompanyName = $_POST["newCompanyName"];
        $oldUserName = $_POST["oldUserName"];
        $newUserName = $_POST["newUserName"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $resume = $_POST["resume"];

        require_once "../include/dbconn.php";
        require_once "../include/functions.php";

        editAplliedStudent($conn, $newCompanyName, $newUserName, $email, $gender, $resume, $oldCompanyName, $oldUserName);
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
            <a href="./appliedstudents.php">
                <button type="button" class="btn btn-warning text-white">
                    <i class="fas fa-ban"></i> Back
                </button>
            </a>
            <form class="mt-4 border border-info p-4" action="./updateapplieddstudent.php" method="post">
                <h4>Update Jobs</h4>
                <div class="mb-3">
                    <label for="company" class="form-label">Old Company Name</label>
                    <input type="text" class="form-control" id="company" name="oldCompanyName" value="<?php echo htmlspecialchars($_GET['companyname']); ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">New Company Name</label>
                    <input type="text" class="form-control" id="company" name="newCompanyName" value="<?php echo htmlspecialchars($_GET['companyname']); ?>" placeholder="Enter New Company Name" />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Old UserName</label>
                    <input type="text" class="form-control" id="jobname" name="oldUserName" value="<?php echo htmlspecialchars($_GET['username']); ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">New UserName</label>
                    <input type="text" class="form-control" id="jobname" name="newUserName" value="<?php echo htmlspecialchars($_GET['username']); ?>" placeholder="Enter New UserName" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>" />
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="<?php echo htmlspecialchars($_GET['gender']); ?>" />
                </div>
                <div class="mb-3">
                    <label for="resume" class="form-label">Resume</label>
                    <input type="text" class="form-control" id="resume" name="resume" value="<?php echo htmlspecialchars($_GET['resume']); ?>" />
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