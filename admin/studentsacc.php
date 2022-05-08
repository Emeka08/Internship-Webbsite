<?php
require_once '../component/adminHeader.php';
require_once "../include/dbconn.php";
require_once "../include/functions.php";

if (isset($_SESSION["username"])) {
} else {
  header("location: ./login.php");
  exit();
}
?>

<main>
  <div class="admin-main mt-4 mx-2">
    <div class="hw-70 pb-1 m-auto">
      <h3>Students Account</h3>
      <a href="./addstudents.php">
        <button type="button" class="btn btn-success mb-3">
          <i class="fas fa-plus me-1"></i> Add New Students
        </button>
      </a>
    </div>
    <div class="admTableH m-auto p-3 hw-70 shadow p-3 mb-5 rounded">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM users;";
        $admin = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($admin);
        $getResult = mysqli_stmt_get_result($admin);

        echo '<tbody>';
        $i = 1;
        while ($rows = mysqli_fetch_array($getResult)) {
          echo '<tr>';
          echo '<th scope="row">' . $i++ . '</th>';
          echo '<td>' . $rows['username'] . '</td>';
          echo '<td>' . $rows['firstname'] . '</td>';
          echo '<td>' . $rows['lastname'] . '</td>';
          echo '<td>' . $rows['email'] . '</td>';
          echo '<td>' . $rows['gender'] . '</td>';
          echo '<td>
                  <a href="./updatestudents.php?username=' . $rows["username"] . ' &firstname=' . $rows["firstname"] . ' &lastname=' . $rows["lastname"] . ' &email=' . $rows["email"] . ' &gender=' . $rows["gender"] . '" class="btn btn-warning btn-sm text-white">
                    <i class="far fa-edit"></i> Update
                  </a>
                  <!-- Button trigger modal -->
                  <button type="button" class="mt-2 m-lg-0 btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fas fa-trash me-1"></i>Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to delete this record?</p>
                          <form action="./deletestudents.php" method="post">
                            <div class="input-group mb-3">
                              <span class="input-group-text bg-danger text-white" id="basic-addon1">@</span>
                              <input type="text" name="username" class="form-control" placeholder="Input Record UserName to Confirm" aria-label="Username" aria-describedby="basic-addon1">
                              <button type="submit" name="submit" class="btn btn-danger px-3"><i class="fas fa-trash me-1"></i>Delete</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal"><i class="fas fa-ban me-1"></i>Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>';
          echo '</tr>';
        };
        echo '</tbody>';
        ?>
      </table>
    </div>
  </div>
</main>

<?php
require_once '../component/adminFooter.php';
?>