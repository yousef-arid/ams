<?php
session_start();
include('includes/config.php');
include('functions.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $AdminUserName = $_POST['email'];  
  $AdminPassword = $_POST['password'];
  $hashpass = sha1($AdminPassword);

$stmt = $con->prepare("SELECT id, AdminUserName, AdminPassword FROM tbladmin WHERE AdminUserName = ? AND AdminPassword = ? ");
$stmt->execute(array($AdminUserName,$hashpass));
$row = $stmt->fetch();
$count = $stmt->rowCount();
if($count > 0){
    $_SESSION['username'] = $AdminUserName; 
    $_SESSION['id'] = $row['id'] ;

 header("location:dashboard.php");
  exit();

}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="author" content="PHPGurukul">


        <title>News Portal | Admin Panel</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="assets/js/modernizr.min.js"></script>

        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
<style>
 
.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
    background-image: url("assets/images/banner.jpg");
    background-size: cover;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;
        background-image: url("assets/images/banner.jpg");
  
    }

 
   
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
        margin-left: 5%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-image: url("assets/images/banner.jpg");
    background-size: cover;
    }

    .login-form{
        margin-top: 20%;
        margin-left: 20%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 70%;
    padding: 60px;
    color: #fff;
   
}



.btn-black{
    background-color: #000 !important;
    color: #fff;
}



#box{
    right: 0;
    top: 0;
    position: absolute;
	border: 1px solid;
    margin-right: 1%;
    margin-top: 1%;
    height: 70px;
    width: 200px;
	background-repeat: no-repeat;
	background-position: 10px center;
	max-width: 460px;
    color: #00529B;
	background-color: #BDE5F8;
	background-image: url('https://i.imgur.com/ilgqWuX.png');
}
#box h4,h5{
    margin-left: 50px;
}


#hide1{
    display: none;
}


</style>

    </head>
    <body class="bg-transparent">

    <div class="sidenav">
         <div class="login-main-text">

         </div>
      </div>
      <?php 
if(isset($_POST['submit']) && $count == 0){ ?>
<script>
toastr.error('Invalid Username or Password', 'Error',{timeOut: 2000})
</script>
<?php } ?>
    
      <div class="main">
         <div class="col-12">
            <div class="login-form">
            <form class="login" action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
               <div class="form-row">
                        <div class="col-8">
                            <h3>Email </h3>
                            <span class="error" style="color:red;"><?php if(isset($_POST['submit']) && empty($_POST['email'])){
                                echo "<span class='error' style='color:red;font-size:15px;'>Username is Required*</span>";
                            } ?></span>
                            <input  onfocus="this.placeholder=''" onblur="this.placeholder='Email Address'" name="email" style="height:70px; margin-bottom: 5%; background-color: #f3f6f9; border-color: #f3f6f9;font-size:20px;" type="text" placeholder="Email Address" class="form-control input-lg"/>
                        </div>
                    </div>
                    <div class="form-row">
                         <div class="col-8">
                            
                           <div>  
                           <a href="#" style="font-size: 20px; font-weight:bold;text-decoration:none;" class="pull-right">Forgot Password ?</a>
                            <h3>Password </h3>
                           </div>
                           <span class="error" style="color:red;"><?php if(isset($_POST['submit']) && empty($_POST['password'])){
                                echo "<span class='error' style='color:red;font-size:15px;'>Password is Required*</span>";
                            } ?></span>
                            
                               <!-- <i class="fa-sharp fa-solid fa-eye-slash"></i>  -->
                               <div class="input-group">
<input style="background-color:  #f3f6f9;font-size:20px;border-color: #f3f6f9;" placeholder="********" onfocus="this.placeholder=''" onblur="this.placeholder='********'" name="password" name="password" type="password" id="myInput" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg">
<div id="UpdatePanel1">
<a onmouseenter="myFunction()" onmouseleave="myFunction1()" id="show_password" class="btn btn-primary" type="button"  style="width:45px;display:inline-block;height:66px;position:relative; left:-5px; z-index:4; border-radius:0 11.05px 11.05px 0">
<i  id="hide1" style="font-size:15px;margin-top: 20px;" class="fa-sharp fa-solid fa-eye"></i>
<i id="hide2" style="font-size:15px;margin-top: 20px;" class="fa-sharp fa-solid fa-eye-slash"></i>
</span>
</a>
</div>
</div>
                        </div>
                        <br>
                        
                            <div class="col-8">
                            <button  id="clicked" style="font-size: 20px;border-radius:5px;" name="submit" class="btn w-md btn-bordered btn-primary waves-effect waves-light" type="submit">SignIn</button>
                          </div>
                      
                        </div>
    
               </form>
            </div>
         </div>
      </div>
      <script>
//password hover
function myFunction(){
    var x = document.getElementById("myInput");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

if(x.type === 'password'){
x.type = "text";
y.style.display = "block";
z.style.display = "none";
}
else{
    x.type = "password";
y.style.display = "none";
z.style.display = "block";
}

}
function myFunction1(){
    var x = document.getElementById("myInput");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

if(x.type === 'password'){
x.type = "text";
y.style.display = "block";
z.style.display = "none";
}
else{
    x.type = "password";
y.style.display = "none";
z.style.display = "block";
}

}

      </script>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html> 
