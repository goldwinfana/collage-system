<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>

#cell  {
    border-bottom: 2.5px solid #ef9a9a  !important;
}
#passW{
    border-bottom: 2.5px solid #ef9a9a  !important;
}
#log{
    border-bottom: 2.5px solid #ef9a9a  !important;
}
#link{
    color: red;
}


</style>

<body>

    <!--Nav-->
    <nav >
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Login</a>
        </div>
    </nav>

    <a href="learner/register.php">Register!</a>
    <br>
    <a href="learner/login.php">im a student</a>
    <br>
    <a href="admin/login.php">im an admin</a>

    <!--footer-->
    <footer class="grey darken-4" style="position:fixed; bottom:0; width:100%;">
        <div class="">
            <div class="container">

            </div>
        </div>
    </footer>




    <!--scripts-->
    <script src="script/jquery.min.js"></script>
    <script src="script/materialize.min.js"></script>
    <script src="script/fontawesome.min.js"></script>
    <script src="script/all.min.js"></script>
    <script src="script/wow.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.fixed-action-btn').floatingActionButton();

            $('#btn_login').click(function(e) {
                e.preventDefault();
                var cell = $('#log').val();
                var passW = $('#passW').val();
                var signAs = $('#signAs').val();

                $.ajax({
                    type: "post",
                    url: "loginCpu.php",
                    data: {
                        cell: cell,
                        passW: passW,
                        signAs:signAs
                        
                    },
                    success: function(response) {
                        $('#result').html(response);
                    }
                });

            });

        });
    </script>

</body>

</html>