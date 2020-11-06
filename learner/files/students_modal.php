<!-- Add -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Student Board</b></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <?php
                    $conn = $pdo->open();

                    $stmt = $conn->prepare("SELECT * FROM announcement ");
                    $stmt->execute(['admin_id'=>$_SESSION['admin']]);

                    if($stmt->rowCount() > 0) {

                        echo' 
                                    <table>
                                        <tr>
                                            <th>Date Posted</th>
                                            <th>Announcements</th>
                                        </tr>
                                        <tr>';
                        foreach ($stmt as $row) {

                            echo '
                                <td>' . $row['date_created'] . '</td>
                                <td>' . $row['news'] . '</td>
                               </tr>';

                        }
                        echo'  </table>';
                        $pdo->close();
                    }else{
                        echo '<tr>No News Posted ...</tr>' ;
                    }
                    ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Materisls-->
<div class="modal fade" id="tools">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Student Materials</b></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">


                        <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM material ");
                        $stmt->execute(['admin_id'=>$_SESSION['admin']]);

                        if($stmt->rowCount() > 0) {

                            echo '  <table>
                                        <tr>
                                            <th>Date Posted</th>
                                            <th>Materials</th>
                                            <th>File</th>
                                        </tr>';
                            foreach ($stmt as $row) {

                                echo '
                                   
                                        <tr>
                                <td>' . $row['date_created'] . '</td>
                                <td>' . $row['tool'] . '</td>
                                <td><a href="./../../assets/pdf/' . $row['file'] . '" class="btn"><i class="fa fa-download"></i> Download</a></td>
                                </tr>';

                            }
                            echo '</table>';
                            $pdo->close();
                        }else{
                           echo '<tr>No Materials Found ...</tr>' ;
                        }
                        ?>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Add Student-->
<div class="modal fade" id="marks">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Student Marks</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">


                    <?php
                    $conn = $pdo->open();

                    $stmt = $conn->prepare("SELECT * FROM learner WHERE id=:admin_id ");
                    $stmt->execute(['admin_id'=>$_SESSION['admin']]);

                    if($stmt->rowCount() > 0) {
                        echo '
                                    <table>
                                        <tr>
                                            <th>Course</th>
                                            <th>Mark %</th>
                                            <th>Fees</th>
                                        </tr>
                                        <tr>';
                        foreach ($stmt as $row) {

                            echo '
                                <td>' . $row['course_name'] . '</td>
                                <td>' . $row['mark'] . '</td>
                                 <td>' . $row['fees'] . '</td>
                                </tr>';

                        }
                        echo '</table>';
                        $pdo->close();
                    }else{
                        echo '<tr>No Mark Found ...</tr>' ;
                    }
                    ?>

                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Student</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="./../learner/students_handle.php">
                <input type="hidden" class="userid" name="userid">
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" onkeypress="return /[a-z]/i.test(event.key)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" onkeypress="return /[a-z]/i.test(event.key)">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 


<!-- Activate -->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Activating...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_activate.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>ACTIVATE USER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activate</button>
              </form>
            </div>
        </div>
    </div>
</div> 


     