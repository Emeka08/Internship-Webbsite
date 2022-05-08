<?php
require_once '../component/adminHeader.php';

if (isset($_SESSION["username"])) {
} else {
  header("location: ./login.php");
  exit();
}

?>

<main>
  <div>
    <div class="objectives bg-white mt-2">
      <h2 class="text-center mb-0">
        Objectives Of Internship Portal Platform
      </h2>
      <p class="mb-0">This Internship portal platform aims to:</p>
      <ul>
        <li>
          Enable student get their desired place of internship at their
          convenience.
        </li>
        <li>
          Save student the cost of submitting applications to the selected
          company in person.
        </li>
        <li>Encourage students use the online method of application.</li>
        <li>
          Serves as a bridge of communication between the students and
          Company.
        </li>
        <li>Reduce the stress in recruiting interns for companies.</li>
        <li>
          Provide opportunities to the students to select from a vast list
          of Internship Company to apply to and vice versa.
        </li>
      </ul>
    </div>
    <div>
      <div class="vision mb-3 p-3">
        <h2 class="text-center text-primary">
          Vision Of Internship Portal Platform
        </h2>
        <p class="text-center">
          To improve education in Nigeria by producing highly skilled, well
          qualified and globally competitive students
        </p>
      </div>
      <div class="mission p-3">
        <h2 class="text-center text-primary">
          Mission Of Internship Portal Platform
        </h2>
        <p class="text-center">
          Committed to provide affordable and high quality education
          platforms for the training and development of students equipped
          with the technological knowledge and skills responsive to the
          demands of both local and international communities
        </p>
      </div>
    </div>
  </div>
</main>

<?php
require_once "../component/adminFooter.php"
?>