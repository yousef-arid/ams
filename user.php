<?PHP
ob_start();
session_start();
include("functions.php");
include("includes/config.php");
if(isset($_SESSION['username'])){
    
// condition ? true : false
$do = isset($_GET['do']) ? $_GET['do'] : 'user';
$pagetitle = "Home";


?>


<?php include("includes/home-top.php"); ?>
    
<?php  include("includes/leftsidebar.php"); ?>

    <div id="content-wrapper" class="d-flex flex-column">
    
        <div id="content">
                
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

        <?php
if($do == "user"){ ?>

            <div style="background-color: white;" class="top-title">
                <div  style="margin-left: 1%;" class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                    <span id="TopHeader_lblUsername"><?php echo $_SESSION['username'] ; ?></span>
                    </span>
                    <span class="symbol symbol-35 symbol-light-primary font-size-h5 font-weight-bold">
                    <a  href="logout.php" style="color: #007bff;  text-decoration: none;" id="TopHeader_SignOut" href="javascript:__doPostBack('ctl00$TopHeader$SignOut','')">Sign Out</a>
                    </span>
                </div>
            <hr>
                <h3 style="margin-left: 1%;">Users</h3>
            </div>

            <br>

            <!-- start table  -->
            <!-- <div class="container-fluid"> -->
                <div style="background-color: white;" class="information-table">
            <div style="padding-left: 1%; padding-top:1%;" class="row">
                                <div class="col-md-9">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Users List</h4>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="user.php?do=add">
                                    
                                        <button id="addToTable" class="btn btn-primary"><i class="fas fa-plus" ></i> New Record </button>
                                    </a>
                                </div>
                            </div>

                            <br><hr>

                            <div style="padding-left: 3%;" class="row">
                                <div class="col-md-11">

                                    <div class="demo-box m-t-20">
                                        <div class="table-responsive">
                                            <table id="example" class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                    <tr style="color:#C0C0C0;">
                                                        <th>#</th>
                                                        <th>USER NAME</th>
                                                        <th>EMAIL</th>
                                                        <th>PHONE NUMBER</th>
                                                        <th>ROLE</th>
                                                        <th>ACTIVE</th>
                                                        <th style="color: #007bff;">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $stmt = $con->prepare("select * from  tbladmin");
                                                    $stmt->execute();
                                                    $rows = $stmt->fetchAll();
                                            
                                                    foreach($rows as $row){
                                                    ?>
                                                    <tr>
                                                        <td><?php  echo $row["id"]; ?></td>
                                                        <td><?php  echo $row["AdminUserName"]; ?></td>
                                                        <td><?php  echo $row["AdminEmailId"]; ?></td>
                                                        <td><?php  echo $row["Phone"]; ?></td>
                                                        <td><?php  echo $row["Role"]; ?></td>
                                                        <td><?php 
                                                        if($row["Is_Active"] == 'active'){echo 'active' ;} 
                                                        if($row["Is_Active"] == 'inactive'){echo 'inactive' ;}  
                                                         ?></td>
                                                        <td>
                                                    
                                                        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="user.php?do=edit&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Edit</a>
                <a href="user.php?do=delete&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Delete</a>
                
            </div>
            </div>               


                                                        </td>
                                                    </tr>
            <?php } ?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            <!-- </div> -->
            <!-- end table -->
              



        </div>
            <!-- End of Main Content -->
<?php } elseif($do == "add"){ ?>
 <!-- Add Article Page    -->

 <div style="background-color: white;" class="information-table">
                <div  class="top-title">
                    <div  style="margin-left: 1%;" class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                        <span id="TopHeader_lblUsername"><?php echo $_SESSION['username'] ; ?></span>
                        </span>
                        <span class="symbol symbol-35 symbol-light-primary font-size-h5 font-weight-bold">
                        <a  href="logout.php" style="color: #007bff;  text-decoration: none;" id="TopHeader_SignOut" href="javascript:__doPostBack('ctl00$TopHeader$SignOut','')">Sign Out</a>
                        </span>
                    </div>
                <hr>
                    <h5 style="margin-left: 1%;">User</h5>
                </div>

            </div>

            <br>

            

<div style="background-color:white; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
       
        <div style="padding-left: 1%; padding-top:1%;" class="row">
            <div class="col-md-9">
                <div class="page-title-box">
                    <h5 class="page-title">Add User</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>

        <form class="form-horizontal" action="?do=insert" method="post">
        <div style="margin-left: 1%;margin-right:1%;" class="row">
          
        <div class="col-md-4">
	         <div class="form-group">
	             <label class="label-add-user">First Name</label>
	                 <input type="text" class="form-control" value="" name="firstname" placeholder="Enter First Name">
	                                              
	          </div>
	                                            
	          <div class="form-group">
	               <label class="label-add-user">Phone Number</label>
	                   <input type="text" class="form-control" value="" name="phonenumber" placeholder="Enter Phone Number">
	           </div>
	       </div> 
           
           <div class="col-md-4">   
	             <div class="form-group">
	                 <label class="label-add-user">Last Name</label>
	                      <input type="text" class="form-control" value="" name="lastname" placeholder="Enter Last Name">
	                 </div>
	                                            
	              <div class="form-group">
	                  <label class="label-add-user">Username</label>
	                      <input type="text" class="form-control" value="" name="username" placeholder="Enter Username">
	               </div>
	         </div> 

             <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label class="label-add-user">Password</label>
	                                                    <input type="text" class="form-control" value="" name="password" placeholder="Enter Password">
	                                            </div>
	                                            
	                                            <div class="form-group">  
                                                    <label class="label-add-user" for="role">Role                  :</label>
                                                    <select class="form-control" name="role">
                                        <?php 

                                            $stmt = $con->prepare("select * from  roles");
                                            $stmt->execute();
                                            $rows = $stmt->fetchAll();
                                            if(!$stmt){
                                                echo "Table is Empty";
                                            }else{
                                             foreach($rows as $row){
                                                
                                                echo"<option value=".$row['name'].">".$row['name']."</option>";  
                                             }   
                                            }
                                        ?>
                                                    </select>
                                                </div>
                                                
                                            <div class="form-group">
	                                                <input type="checkbox"  name="active" value="active">
	                                                Active
	                                            </div>    
                                                
	                                        </div> 

                                            <div class="col-md-12">    
	                                            <div class="form-group">
	                                                <label class="label-add-user">Email address</label>
	                                                    <input type="text" class="form-control" value="" name="email" placeholder="Enter Email">
	                                                    <span class="text-email">We'll never share your email with anyone else.</span>
	                                            </div>
	                                        </div>

        </div>

        <div style="padding-left: 3%;margin-bottom:2%;" class="row">
<a style="text-decoration: none;" href="" class="btn-secondary form-control col-2 text-center mr-2 offset-md-*">Cancel</a>
<a style="text-decoration: none;" href="" name="logout"  id="ContentPlaceHolder1_btnLogout" class="btn-secondary form-control col-2 mr-2 text-center">Logout</a>
<a style="text-decoration: none;" href="" name="delete" id="ContentPlaceHolder1_btnDelete"  class="btn-danger form-control col-2 mr-2 text-center">Delete</a>
<input type="submit" name="submit" value="Submit"  id="ContentPlaceHolder1_btnAddUser" class="btn-primary form-control col-2">
</div>
                                
	          </form>
                </div>
                </div>

        

<?php } elseif($do == "insert"){  
// if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){  
if(isset($_POST['submit'])){

$f_name = strip_tags($_POST['firstname']);
$l_name = strip_tags($_POST['lastname']);
$username = strip_tags($_POST['username']);
$pass = strip_tags($_POST['password']);
$password = sha1($pass);
$email = strip_tags($_POST['email']);
$phone = strip_tags($_POST['phonenumber']);
$role = strip_tags($_POST['role']);
$active = $_POST['active'];


    
$formerror = array() ;

if(empty($f_name)) {
	$formerror[] = "Please enter the first name!";
}

if(empty($l_name)) {
	$formerror[] = "Please enter the last name!";
}

if(empty($username)) {
	$formerror[] = "Please enter the username!";
}

if(empty($pass)) {
	$formerror[] = "Please enter the password!";
}

if(empty($role)) {
	$formerror[] = "Please enter the role!";
}

if(empty($email)) {
	$formerror[] = "Please enter the email!";
}


foreach($formerror as $error) {
	echo("<div class='alert alert-danger'>" . $error . "</div>");	
	}

    if(empty($formerror) && isset($_POST['active'])){
$stmt_insert = $con->prepare("INSERT INTO  tbladmin 
(f_name,l_name,AdminUserName,AdminPassword,AdminEmailId,Phone,Role,Is_Active)
VALUES (:zf_name,:zl_name,:zAdminUserName,:zAdminPassword,:zAdminEmailId,:zPhone,:zRole,:zIs_Active)");

$stmt_insert->execute(array(
'zf_name' => $f_name,
'zl_name' => $l_name,
'zAdminUserName' => $username,
'zAdminPassword' => $password,
'zAdminEmailId' => $email,
'zPhone' => $phone,
'zRole' => $role,
'zIs_Active' => $active
));
header("location:user.php");
    


}elseif(empty($formerror) && !isset($_POST['active'])){
    $inactive = "inactive";
    $stmt_insert = $con->prepare("INSERT INTO  tbladmin 
    (f_name,l_name,AdminUserName,AdminPassword,AdminEmailId,Phone,Role,Is_Active)
    VALUES (:zf_name, :zl_name, :zAdminUserName, :zAdminPassword, :zAdminEmailId, :zPhone, :zRole, :zIs_Active)");
    
    $stmt_insert->execute(array(
    'zf_name' => $f_name,
    'zl_name' => $l_name,
    'zAdminUserName' => $username,
    'zAdminPassword' => $password,
    'zAdminEmailId' => $email,
    'zPhone' => $phone,
    'zRole' => $role,
    'zIs_Active' => $inactive,
   
    ));
    header("location:user.php");

}

    ?>


  <?php 
}else{
  echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  
}
} elseif($do == "edit"){   
    
    ?>

<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])){
$user_id = $_GET['id'];
$stmt = $con->prepare("SELECT * FROM tbladmin WHERE id = ? LIMIT 1");
$stmt->execute(array($user_id));
$row = $stmt->fetch();
$count = $stmt->rowCount();

if($stmt->rowCount() > 0){ ?>


<div style="background-color: white;" class="information-table">
                <div  class="top-title">
                    <div  style="margin-left: 1%;" class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                        <span id="TopHeader_lblUsername"><?php echo $_SESSION['username'] ; ?></span>
                        </span>
                        <span class="symbol symbol-35 symbol-light-primary font-size-h5 font-weight-bold">
                        <a  href="logout.php" style="color: #007bff;  text-decoration: none;" id="TopHeader_SignOut" href="javascript:__doPostBack('ctl00$TopHeader$SignOut','')">Sign Out</a>
                        </span>
                    </div>
                <hr>
                    <h5 style="margin-left: 1%;">Users</h5>
                </div>

            </div>

            <br>

            

<div style="background-color:white; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
       
        <div style="padding-left: 1%; padding-top:1%;" class="row">
            <div class="col-md-9">
                <div class="page-title-box">
                    <h5 class="page-title">Edit User</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>

        <form class="form-horizontal" action="?do=update" method="post">
        <div style="margin-left: 1%;margin-right:1%;" class="row">
          
        <input name="id" type="hidden" value="<?php echo $row['id']; ?>" class="form-control">

        <div class="col-md-4">
	         <div class="form-group">
	             <label class="label-add-user">First Name</label>
	                 <input type="text" class="form-control" value="<?php echo $row['f_name']; ?>" name="firstname" placeholder="Enter First Name">
	                                              
	          </div>
	                                            
	          <div class="form-group">
	               <label class="label-add-user">Phone Number</label>
	                   <input type="text" class="form-control" value="<?php echo $row['Phone']; ?>" name="phonenumber" placeholder="Enter Phone Number">
	           </div>
	       </div> 
           
           <div class="col-md-4">   
	             <div class="form-group">
	                 <label class="label-add-user">Last Name</label>
	                      <input type="text" class="form-control" value="<?php echo $row['l_name']; ?>" name="lastname" placeholder="Enter Last Name">
	                 </div>
	                                            
	              <div class="form-group">
	                  <label class="label-add-user">Username</label>
	                      <input type="text" class="form-control" value="<?php echo $row['AdminUserName']; ?>" name="username" placeholder="Enter Username">
	               </div>
	         </div> 

             <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label class="label-add-user">Password</label>
	                                                    <input type="text" class="form-control" value="<?php echo $row['AdminPassword']; ?>" name="password" placeholder="Enter Password">
	                                            </div>
	                                            
	                                            <div class="form-group">  
                                                    <label class="label-add-user" for="role">Role                  :</label>
                                                    <select class="form-control" name="role">
                                        <?php 
                                            $stmt_role = $con->prepare("select * from  roles");
                                            $stmt_role->execute();
                                            $rows_role = $stmt_role->fetchAll();
                                            if(!$stmt_role){
                                                echo "Table is Empty";
                                            }else{
                                             foreach($rows_role as $row_role){
                                                
                                                echo"<option value=".$row_role['name'].">".$row_role['name']."</option>";  
                                             }   
                                            }
                                        ?>
                                                    </select>
                                                </div>
                                                
                                            <div class="form-group">
	                                                <input type="checkbox"  name="active" <?php if($row['Is_Active'] == 'active'){ echo 'checked';} ?> value="active">
	                                                Active
	                                            </div>    
                                                
	                                        </div> 

                                            <div class="col-md-12">    
	                                            <div class="form-group">
	                                                <label class="label-add-user">Email address</label>
	                                                    <input type="text" class="form-control" value="<?php echo $row['AdminEmailId']; ?>" name="email" placeholder="Enter Email">
	                                                    <span class="text-email">We'll never share your email with anyone else.</span>
	                                            </div>
	                                        </div>

        </div>

        <div style="padding-left: 3%;margin-bottom:2%;" class="row">
<a style="text-decoration: none;" href="" class="btn-secondary form-control col-2 text-center mr-2 offset-md-*">Cancel</a>
<a style="text-decoration: none;" href="" name="logout"  id="ContentPlaceHolder1_btnLogout" class="btn-secondary form-control col-2 mr-2 text-center">Logout</a>
<a style="text-decoration: none;" href="" name="delete" id="ContentPlaceHolder1_btnDelete"  class="btn-danger form-control col-2 mr-2 text-center">Delete</a>
<input type="submit" name="submit" value="Submit"  id="ContentPlaceHolder1_btnAddUser" class="btn-primary form-control col-2">
</div>
                                
	          </form>
                  
        </div>
            
<?php 
}else{
    echo "<h1 style='background-color:red;color:white;text-align:center;'>There is no such [id]</h1>";
}

}else{
    echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry there was a problem with your request</h1>";
}

}elseif($do == "update"){ 
    
   if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $userid = $_POST['id']; 
    $f_name = strip_tags($_POST['firstname']);
    $l_name = strip_tags($_POST['lastname']);
    $username = strip_tags($_POST['username']);
    $pass = strip_tags($_POST['password']);
    $password = sha1($pass);
    $email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phonenumber']);
    $role = strip_tags($_POST['role']);
    $active = $_POST['active'];

    
        if(isset($_POST['active'])){
$stmt_update = $con->prepare("UPDATE tbladmin SET 
f_name = ?,l_name = ?,AdminUserName = ?,AdminPassword = ?,AdminEmailId = ?,Phone = ?,Role = ?,Is_Active = ? WHERE id = ?");
$stmt_update->execute(array($f_name,$l_name,$username,$password,$email,$phone,$role,$active,$userid));
   header("location:user.php");
    
    }elseif(!isset($_POST['active'])){
        $inactive = "inactive";
        $stmt_update = $con->prepare("UPDATE tbladmin SET 
        f_name = ?,l_name = ?,AdminUserName = ?,AdminPassword = ?,AdminEmailId = ?,Phone = ?,Role = ?,Is_Active = ? WHERE id = ?");
        $stmt_update->execute(array($f_name, $l_name, $username,$password,$email,$phone,$role,$inactive,$userid));
           header("location:user.php");
    
    }

// $stmt_update = $con->prepare("UPDATE lblarticles SET 
// section = ?, rubric = ?, comments = ?, author = ?, title = ?, seo = ?, hat = ?, article = ?, videos = ?, main_image = ?, slide_images = ?, files = ?, custom_field = ?, quotes = ?, transfer_to = ?, publicate_date = ? WHERE id = ?");
// $stmt_update->execute(array($section, $rubric, $comments, $author, $title, $seo, $hat, $article, $videos, $image_name, implode(",",$images_name), implode(",",$files_name), $all_custom_field,  $quotes, $transfer_to, $date, $articleid));
//    header("location:user.php");

   ?>



 <?php
} else{
    echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  

}
} elseif($do == "delete"){
    try {
        $userid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt = $con ->prepare("select * from tbladmin where id = ? limit 1 ");
        $stmt->execute(array($userid));
        $count = $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        
        if ($stmt->rowCount() > 0) {	
        $stmt = $con->prepare("delete from tbladmin where id = :zadminid ");
        $stmt->bindParam(":zadminid" , $userid);	
        $stmt->execute();
        header ('location:user.php') ;
            
        } else {
            echo 'This name does not exist' ;
        }
}  
?>


<!-- Footer -->
<?php  include("includes/footer.php"); ?>
<!-- End of Footer -->

    </div>
        <!-- End of Content Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


<?PHP
include("includes/home-down.php");

}else{
    header("location:index.php");
}

?>