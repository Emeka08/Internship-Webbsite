<?php

function emptyInputSignup($username, $firstname, $lastname, $password, $cpassword)
{

    if (empty($username) || empty($firstname) || empty($lastname) || empty($password) || empty($cpassword)) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
};

function invalidUsername($username)
{

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
};

function invalidEmail($email)
{

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
};

function passwordMatch($password, $cpassword)
{

    if ($password !== $cpassword) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
};

function usernameExist($conn, $username, $email)
{

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = FALSE;
        return $result;
    }

    mysqli_stmt_close($stmt);
};

function NameExist($conn, $dbName, $columnName, $username)
{

    $sql = "SELECT * FROM $dbName WHERE $columnName = ?";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = FALSE;
        return $result;
    }

    mysqli_stmt_close($stmt);
};

function createUser($conn, $username, $firstname, $lastname, $email, $gender, $password)
{
    $sql = "INSERT INTO users (username, firstname, lastname, email, gender, password) VALUES (?,?,?,?,?,?);";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./studentsacc.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $username, $firstname, $lastname, $email, $gender, $hashedPassword);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./login.php");
    exit();
};

function emptyInputLogin($username, $password)
{

    if (empty($username) || empty($password)) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
}

function emptyAdminInputLogin($username, $name, $password)
{

    if (empty($username) || empty($password) || empty($name)) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
}

function emptyInputJobLogin($company, $jobname, $state, $jobdescription)
{

    if (empty($company) || empty($jobname) || empty($state) || empty($jobdescription)) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    $usernameExist = usernameExist($conn, $username, $username);

    if ($usernameExist === false) {
        header("location: ./login.php?error=wronglogin");
        exit();
    } else {
        $passwordHashed = $usernameExist["password"];

        $checkPassword = password_verify($password, $passwordHashed);

        if ($checkPassword === false) {
            header("location: ./login.php?error=wronglogin");
            exit();
        } else {
            session_start();
            $_SESSION["userid"] = $usernameExist["userId"];
            $_SESSION["username"] = $usernameExist["username"];
            $_SESSION["firstname"] = $usernameExist["firstname"];
            $_SESSION["lastname"] = $usernameExist["lastname"];
            $_SESSION["email"] = $usernameExist["email"];
            header("location: ./index.php");
            exit();
        }
    }
}

function resumeEmpty($resume)
{

    if (empty($resume)) {
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
};

function adminUserNameExist($conn, $username)
{

    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = FALSE;
        return $result;
    }

    mysqli_stmt_close($stmt);
};

function  loginAdmin($conn, $username, $password)
{
    $adminUserNameExist = adminUserNameExist($conn, $username);

    if ($adminUserNameExist === false) {
        header("location: ./login.php?error=wronglogin");
        exit();
    } else {
        $passwordHashed = $adminUserNameExist["password"];

        $checkPassword = password_verify($password, $passwordHashed);

        if (!$checkPassword) {
            header("location: ./login.php?error=wronglogin2");
            exit();
        } else {
            session_start();
            $_SESSION["adminId"] = $adminUserNameExist["adminId"];
            $_SESSION["username"] = $adminUserNameExist["username"];
            $_SESSION["name"] = $adminUserNameExist["name"];
            $_SESSION["password"] = $adminUserNameExist["password"];
            header("location: ./index.php");
            exit();
        }
    }
}

function saveApplication($conn, $companyName, $userName, $email, $gender, $resume)
{
    $sql = "INSERT INTO applied_students (companyName, userName, email, gender, resume) VALUES (?,?,?,?,?);";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./apply.php?error=stmtfailed30");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $companyName, $userName, $email, $gender, $resume);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./index.php");
    exit();
}

function addAdmin($conn, $username, $name, $password)
{
    $sql = "INSERT INTO admins (username, name, password) VALUES (?,?,?);";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./apply.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $name, $hashedPassword);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./administrator.php");
    exit();
}

function addjob($conn, $company, $jobname, $state, $jobdescription)
{
    $sql = "INSERT INTO internship_jobs (companyName, jobName, state, jobDescription) VALUES (?,?,?,?);";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./apply.php?error=stmtfailed30");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $company, $jobname, $state, $jobdescription);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./uploadjobs.php");
    exit();
}

function editAdmin($conn, $newUsername, $name, $password, $oldUsername)
{
    $sql = "UPDATE admins SET username= ?, name= ?, password = ? WHERE username= ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./updateadmin.php?error=stmtfailed30");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $newUsername, $name, $hashedPassword, $oldUsername);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./administrator.php");
    exit();
}

function editJob($conn, $newCompanyName, $jobname, $state, $jobdescription, $oldCompanyName)
{
    $sql = "UPDATE internship_jobs SET companyName= ?, jobName= ?, state= ?, jobDescription= ? WHERE companyName= ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./updateadmin.php?error=stmtfailed30");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $newCompanyName, $jobname, $state, $jobdescription, $oldCompanyName);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./uploadjobs.php");
    exit();
}

function editStudent($conn, $oldUsername, $newUsername, $firstname, $lastname, $email, $gender, $password)
{
    $sql = "UPDATE users SET username= ?, firstname= ?, lastname= ?, email= ?, gender= ?, password= ? WHERE username= ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./updateadmin.php?error=stmtfailed30");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $newUsername, $firstname, $lastname, $email, $gender, $hashedPassword, $oldUsername);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./studentsacc.php");
    exit();
}

function editAplliedStudent($conn, $newCompanyName, $newUserName, $email, $gender, $resume, $oldCompanyName, $oldUserName)
{
    $sql = "UPDATE applied_students SET companyName= ?, userName= ?, email= ?, gender= ?, resume= ? WHERE username= ? AND companyName= ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./appliedstudents.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $newCompanyName, $newUserName, $email, $gender, $resume, $oldUserName, $oldCompanyName);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./appliedstudents.php");
    exit();
}

function deleteAdmin($conn, $username)
{
    $sql = "DELETE FROM admins WHERE username = ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./updateadmin.php?error=stmtfailed30");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./administrator.php");
    exit();
}

function deleteStudents($conn, $username)
{
    $sql = "DELETE FROM users WHERE username = ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./updateadmin.php?error=stmtfailed30");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./studentsacc.php");
    exit();
}

function deletejob($conn, $username)
{
    $sql = "DELETE FROM internship_jobs WHERE companyName = ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./updatejobs.php?error=stmtfailed300");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./uploadjobs.php");
    exit();
}

function deleteAppliedStudent($conn, $username, $companyName)
{
    $sql = "DELETE FROM applied_students WHERE userName = ? AND companyName= ?;";
    $stmt  = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./updatejobs.php?error=stmtfailed300");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $companyName);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ./appliedstudents.php?jdjdsj");
    exit();
}
