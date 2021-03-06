<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['Email']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wendy & David Library</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">Wendy & David Library </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/profile.png" width="20%" height="20%" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">

                                <li><a href="index.php"><i class="menu-icon icon-user"></i>Manage Users </a>
                                </li>
                                <li><a href="add_user.php"><i class="menu-icon icon-user"></i>Add User </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>


                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <!--/.span9-->
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Add User</h3>
                            </div>
                            <div class="module-body">


                                    <br >

                                    <form class="form-horizontal row-fluid" action="add_user.php" method="post">

                                        <div class="control-group">
                                            <label class="control-label" for="Username"><b>Username</b></label>
                                            <div class="controls">
                                                <input type="text" id="username" name="username" placeholder="Username"class="span8" required>

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Email"><b>Email</b></label>
                                            <div class="controls">
                                                <input type="text" id="email" name="email" placeholder="Email" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Password"><b>Password</b></label>
                                            <div class="controls">
                                                <input type="text" id="Password" name="Password" placeholder="Password" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Role"><b>Role</b></label>
                                            <div class="controls">
                                                <select name="Role" id="Role" class="span8" required>
                                                    <option value="Student">Student</option>
                                                    <option value="Staff and Faculty">Staff and Faculty</option>
                                                    <option value="Librarian">Librarian</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Add User</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>



                    </div><!--/.content-->
                </div>

                </div>
            </div>
            <!--/.container-->

        </div>




        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

<?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];

    $Password=$_POST['Password'];
    $Role=$_POST['Role'];


$sql1="insert into lms.user (Username,Email,Password,Role) values ('$username','$email','$Password','$Role')";

if($conn->query($sql1) === TRUE){echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}

}
?>

    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>