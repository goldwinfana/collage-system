<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Collage System</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="./../admin/welcome.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-eye"></i> View<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">All Users</a></li>
                    <li><a href="./../admin/students.php">Learners</a></li>
                    <li><a href="#">Subjects</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="./../logout.php"><?php echo $_SESSION['email']; ?></a></li>
            <li><a href="./../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>