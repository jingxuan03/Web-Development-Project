<?php
include 'mldb_conn.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Get the selected status value
  $selectedStatus = $_POST['status'];

  // Update the status value in the database for the corresponding movie
  $movieId = $_POST['movie_id'];
  $updateSql = "UPDATE movielist SET status = '$selectedStatus' WHERE id = '$movieId'";
  $updateResult = mysqli_query($con, $updateSql);
  if ($updateResult) {
      echo "";
  } else {
      echo "" . mysqli_error($con);
  }
}

if (isset($_POST['submit2'])) {
  // Get the selected status value
  $selectedStatus = $_POST['rating'];

  // Update the status value in the database for the corresponding movie
  $movieId = $_POST['movie_id'];
  $updateSql = "UPDATE movielist SET rating = '$selectedStatus' WHERE id = '$movieId'";
  $updateResult = mysqli_query($con, $updateSql);
  if ($updateResult) {
      echo "";
  } else {
      echo "" . mysqli_error($con);
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/movielist.css" />
    <style>
      /* Style the table */
      .table {
        background-color: black;
          width: 100%;
          border-collapse: collapse;
          color: white;
      }
  
      /* Style the table header */
      .table thead th {
          background-color: black;
          padding: 10px;
          text-align: left;
          color: white;
      }
  
      /* Style the table body */
      .table tbody td {
        background-color: black;
          padding: 10px;
          border-bottom: 1px solid #ddd;
          border-top: 1px solid #ddd;
          color: white;
      }
      .id-column {
        background-color: black;
        color: white;
      }

      select {
        background-color: black;
        color: white;
      }
      
  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.html"><h1>Movie Information</h1></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="movielist.php" role="button" style="margin-right: 10px; margin-left: 10px;"> Movie List </a>
                  </li>
              <li class="nav-item">
                <a class="btn btn-outline-secondary" href="support.html" role="button" style="margin-right: 10px; margin-left: 10px;">Support</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="btn btn-outline-secondary" href="logout.php" role="button"> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <h1>Movie List</h1>
  <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Movie Name</th>
            <th scope="col">Genre Type</th>
            <th scope="col">Status</th>
            <th scope="col">Rating</th>
          </tr>
        </thead>
        <tbody>

        <?php

        $sql="Select * from movielist";
        $result=mysqli_query($con,$sql);
        if($result){
          while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $moviename=$row['moviename'];
            $genretype=$row['genretype'];
            $status=$row['status'];
            $rating=$row['rating'];
            echo ' <tr>
            <td scope="row">'.$id.'</td>
            <td>'.$moviename.'</td>
            <td>'.$genretype.'</td>
            <td>
            <form method="POST" action="">
                            <input type="hidden" name="movie_id" value="'.$id.'">
                            <select name="status">
                              <option value="NULL" '.($status == "" ? 'selected' : '').'></option>
                                <option value="Plan to Watched" '.($status == "Plan to Watched" ? 'selected' : '').'>Plan to Watched</option>
                                <option value="On Hold" '.($status == "On-Hold" ? 'selected' : '').'>On-Hold</option>
                                <option value="Completed" '.($status == "Completed" ? 'selected' : '').'>Completed</option>
                            </select>
                            <input type="submit" name="submit" value="Save">
                        </form>
            </td>
            <td>
            <form method="POST" action="">
                            <input type="hidden" name="movie_id" value="'.$id.'">
                            <select name="rating">
                              <option value="NULL" '.($rating == "" ? 'selected' : '').'></option>
                                <option value="1 STAR" '.($rating == "1 STAR" ? 'selected' : '').'>1 STAR</option>
                                <option value="2 STARS" '.($rating == "2 STARS" ? 'selected' : '').'>2 STARS</option>
                                <option value="3 STARS" '.($rating == "3 STARS" ? 'selected' : '').'>3 STARS</option>
                                <option value="4 STARS" '.($rating == "4 STARS" ? 'selected' : '').'>4 STARS</option>
                                <option value="5 STARS" '.($rating == "5 STARS" ? 'selected' : '').'>5 STARS</option>
                            </select>
                            <input type="submit" name="submit2" value="Save">
                        </form>
          </td>
          </tr>';  
          }
        }
        ?>
          
        </tbody>
      </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>