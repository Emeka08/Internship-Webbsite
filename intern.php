<?php
require_once "./component/header.php";
require_once "./include/dbconn.php";
require_once "./include/functions.php";
?>
<main>
  <div class="intern-main m-4">
    <h3 class="pb-1" id="setDate">DATE</h3>
    <div class="tableH m-auto border border-primary p-3">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Company</th>
            <th scope="col">Job Name</th>
            <th scope="col">State</th>
            <th scope="col">Job Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM internship_jobs;";
        $jobList = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($jobList);
        $getResult = mysqli_stmt_get_result($jobList);

        echo '<tbody>';
        $i = 1;
        while ($rows = mysqli_fetch_array($getResult)) {
          echo '<tr>';
          echo '<th scope="row">' . $i++ . '</th>';
          echo '<td>' . $rows['companyName'] . '</td>';
          echo '<td>' . $rows['jobName'] . '</td>';
          echo '<td>' . $rows['state'] . '</td>';
          echo '<td>' . $rows['jobDescription'] . '</td>';
          echo '
                <td>
                <a href=" ' . './apply.php?companyname=' . $rows['companyName'] .  '"><button type="button" class="btn btn-success btn-sm">
                    <i class="far fa-edit"></i> Apply
                  </button></a>
                </td>
              ';
          echo '</tr>';
        };
        echo '</tbody>';
        ?>
      </table>
    </div>
  </div>
</main>
<?php
require_once "./component/footer.php";
?>