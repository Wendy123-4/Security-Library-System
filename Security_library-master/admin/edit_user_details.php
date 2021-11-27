<?php
ob_start();
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
                                    <li><a href="profile.php">Profile</a></li>
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
                    
                    <div class="span9">
                        <div class="module">
                            <div class="module-head">
                                <h3>Edit User Details</h3>
                            </div>
                            <div class="module-body">

                                <?php
                                    $email = $_GET['Email'];
                                    $sql = "select * from lms.user where Email='$email'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
                                    $username=$row['Username'];
                                    $email=$row['Email'];
                                    $password=$row['Password'];
                                    $role=$row['Role'];


                                ?>

                                    <br >
                                    <form class="form-horizontal row-fluid" action="edit_user_details.php?Email=<?php echo $email ?>" method="post">
                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Username">Username:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Username" name="Username" value= "<?php echo $username?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Email">Email:</label></b>
                                            <div class="controls">
                                                <input type="text" id="Email" name="Email" value= "<?php echo $email?>" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Password">Password:</label></b>
                                            <div class="controls">
                                            <input type="password" id= "Password" name="Password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value= "<?php echo $password?>" class="span8" required>


                                            </div>
                                        </div>

                                        <div class="control-group">
                                        <b>
                                            <label class="control-label" for="Role"><b>Role</b></label><b>
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
                                                <button type="submit" name="submit"class="btn">Edit Details</button>
                                            </div>
                                        </div>

                                    </form> 
                                    </div>   
                                    </div>          
                    </div>
                    
                    <!--/.span9-->
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
    $emailid = $_GET['Email'];
    $username=$_POST['Username'];
    $password=$_POST['Password'];
    $password=md5($password);
    $email=$_POST['Email'];
    $role=$_POST['Role'];


$sql1="update lms.user set Email='$email', Username='$username', Password='$password', Role='$role' where Email='$emailid'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=index.php", true, 303);
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