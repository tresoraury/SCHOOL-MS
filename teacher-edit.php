<?php

session_start();
require 'dbcon.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>web learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>


    <div class="container mt-5">

        <?php include('message.php') ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="index2.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id']))
                            {
                                $teacher_id = mysqli_real_escape_string($con, $_GET['id']);
                                $query = "SELECT * FROM teachers WHERE id='$teacher_id' ";

                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $teacher = mysqli_fetch_array($query_run);
                                    ?>


                                
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="teacher_id" value="<?=$teacher['id']; ?>">

                                        <div class="mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="firstname" value="<?=$teacher['firstname']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Last Name</label>
                                            <input type="text" name="lastname" value="<?=$teacher['lastname']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Designation</label>
                                            <input type="text" name="designation" value="<?=$teacher['designation']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="<?=$teacher['phone']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_teacher" class="btn btn-primary">Update Teacher</button>
                                        </div>
                                    </form>
                                    <?php
                                }
                                    else
                                    {
                                    echo "<h4>NO ID FOUND</h4>";
                                    }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>