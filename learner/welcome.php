<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css"> body{ font: 14px sans-serif;
            text-align: center; }
    </style>
</head>
<body>
<div class="page-header">


    <h1>STUDENT DASHBOARD</h1>

</div>

<div class="bs-example w3layouts" style="padding: 20px;color: white;" align="center">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6" style="display: flex;">
            <!-- small box -->
            <div class="small-box bg-red" style="padding: 70px; background: deepskyblue">
                <div class="inner">
                    <br>
                    <br>
                    <p>Update</p>
                </div>
                <div class="icon" >
                    <i class="fa fa-barcode" ></i>
                </div>
                <a href="#edit" class="small-box-footer edit" >Update User <i class="fa fa-plus-square-o"></i></a>
            </div><span style="padding-left: 20px"></span>
                <!-- small box -->
                <div class="small-box bg-red"  style="padding: 70px; background: yellowgreen">
                    <div class="inner">
                        <br>
                        <br>
                        <p>Materials</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-barcode" style="color: white"></i>
                    </div>
                    <a href="#materials" class="small-box-footer tools">Check Materials <i class="fa fa-eye"></i></a>
                </div><span style="padding-left: 20px"></span>

            <div class="small-box bg-red"  style="padding: 70px; background: black;">
                <div class="inner">
                    <br>
                    <br>
                    <p>Marks %</p>
                </div>
                <div class="icon">
                    <i class="fa fa-barcode" style="color: white"></i>
                </div>
                <a href="#announcements" class="small-box-footer marks">View Marks <i class="fa fa-arrow-circle-right"></i></a>
            </div><span style="padding-left: 20px"></span>

            <div class="small-box bg-red"  style="padding: 70px; background: grey;">
                <div class="inner">
                    <br>
                    <br>
                    <p>Announcements</p>
                </div>
                <div class="icon">
                    <i class="fa fa-barcode" style="color: white"></i>
                </div>
                <a href="#announcements" class="small-box-footer view">View Announcements <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

</div>

</body>
</html>


<script src="./../assets/js/main.js"></script>
<?php include ('./../learner/files/students_modal.php')?>
<script>
    $(function() {

        $(document).on('click', '.edit', function (e) {

            e.preventDefault();
            $('#edit').modal('show');
            getCourse();
        });


        $(document).on('click', '.tools', function (e) {

            e.preventDefault();
            $('#tools').modal('show');
        });

        $(document).on('click', '.marks', function (e) {

            e.preventDefault();
            $('#marks').modal('show');
        });

        $(document).on('click', '.view', function (e) {

            e.preventDefault();
            $('#view').modal('show');
            var id = this.id;
            getRow(id);
        });
    });
    function getCourse(){
        $.ajax({
            type: 'POST',
            url: './../learner/students_handle.php',
            data: {stud_id:1},
            dataType: 'json',
            success: function(response){

                $('.userid').val(response.id);
                $('#id').val(response.id);
                $('#edit_email').val(response.email);
                $('#edit_password').val(response.password);
                $('#edit_firstname').val(response.first_name);
                $('#edit_lastname').val(response.last_name);
                $('.fullname').val(response.first_name+' '+response.last_name);
            }
        });
    }

    function getRow(){

        $.ajax({
            type: 'POST',
            url: './../learner/students_handle.php',
            data: {stud_id:1},
            dataType: 'json',
            success: function(response){

                $('#id').html(response.id);
                $('#email').html(response.email);
                $('#password').html(response.password);
                $('#firstname').html(response.first_name);
                $('#lastname').html(response.last_name);
                $('.fullname').html(response.first_name+' '+response.last_name);
            }
        });
    }
</script>