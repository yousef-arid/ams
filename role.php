<?PHP
ob_start();
session_start();
include("functions.php");
include("includes/config.php");
if(isset($_SESSION['username'])){
    
// condition ? true : false
$do = isset($_GET['do']) ? $_GET['do'] : 'role';
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
if($do == "role"){ ?>

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
                <h3 style="margin-left: 1%;">Roles</h3>
            </div>

            <br>

            <!-- start table  -->
            <!-- <div class="container-fluid"> -->
                <div style="background-color: white;" class="information-table">
            <div style="padding-left: 1%; padding-top:1%;" class="row">
                                <div class="col-md-9">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Roles List</h4>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="role.php?do=add">
                                    
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
                                                        <th style="color: #007bff;">ROLE ID</th>
                                                        <th>Role Name</th>
                                                        <th>ENABLE</th>
                                                        <th >MORE ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $stmt = $con->prepare("select * from  roles");
                                                    $stmt->execute();
                                                    $rows = $stmt->fetchAll();
                                            
                                                    foreach($rows as $row){
                                                    ?>
                                                    <tr>
                                                        <td><?php  echo $row["id"]; ?></td>
                                                        <td><?php  echo $row["name"]; ?></td>
                                                        <td><?php 
                                                        if($row["active"]=="active"){echo "<i style='color:green;' class='fas fa-check'></i>";}
                                                        if($row["active"]=="inactive"){echo "<h5 style='color:red;'>X</h5>";}
                                                         ?></td>
                                                        <td>
                                                    
                                                        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="role.php?do=edit&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Edit</a>
                <a href="role.php?do=delete&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Delete</a>
                
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
                    <h5 style="margin-left: 1%;">Articles</h5>
                </div>

            </div>

            <br>

            

<div style="background-color:white; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
       
        <div style="padding-left: 1%; padding-top:1%;" class="row">
            <div class="col-md-9">
                <div class="page-title-box">
                    <h5 class="page-title">Role & Permissions</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>

        <form action="?do=insert" method="post">

        <div class="card-body">

<div class="form-group row col-12">
<div class="col-sm-4">
<label>Role Name</label>
<input name="name" type="text"  class="form-control">
</div>
<div style="margin-top: 3%;" class="col-sm-4 mt-10">
<label class="checkbox">active</label>
<input  type="checkbox" value="active" name="active">
</div>
</div>


</div>

<div class="row">
        <div style="margin-top: 2%;" class="col-md-4">
            <a  name="cancel" class="link-delete"  href="articles.php?do=delete">Cancel</a>
            <input style="margin-bottom: 1%;padding-right:15%;padding-left: 15%;" type="submit" name="submit" class="btn btn-primary"/>

        </div>

        </div>
        </form>
                  
        </div>

        

<?php } elseif($do == "insert"){  
// if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){  
if(isset($_POST['submit'])){

$name = strip_tags($_POST['name']);
$active = $_POST['active'];

$formerror = array() ;

if(empty($name)) {
	$formerror[] = "Please enter the name!";
}

foreach($formerror as $error) {
	echo("<div class='alert alert-danger'>" . $error . "</div>");	
	}
    /// ffffffff

    if(empty($formerror) && isset($_POST['active'])){

$stmt_insert = $con->prepare("INSERT INTO roles 
(name,active)
VALUES (:zname,:zactive)");

$stmt_insert->execute(array(
'zname' => $name,
'zactive' => $active,
));

    }elseif(empty($formerror) && !isset($_POST['active'])){
        $inactive = "inactive";
        $stmt_insert = $con->prepare("INSERT INTO roles 
        (name,active)
        VALUES (:zname,:zactive)");

        $stmt_insert->execute(array(
        'zname' => $name,
        'zactive' => $inactive,
        ));
    }

    header("location:role.php");
    ?>

 

  <?php 
}else{
  echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  
}
} elseif($do == "edit"){   
    
    ?>

<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])){
$role_id = $_GET['id'];
$stmt = $con->prepare("SELECT * FROM roles WHERE id = ? LIMIT 1");
$stmt->execute(array($role_id));
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
                    <h5 style="margin-left: 1%;">Roles</h5>
                </div>

            </div>

            <br>
            

<div style="background-color:white; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
       
        <div style="padding-left: 1%; padding-top:1%;" class="row">
            <div class="col-md-9">
                <div class="page-title-box">
                    <h5 class="page-title">Roles & Permissions</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>

        <form action="?do=update" method="post">

<div class="card-body">

<input name="id" type="hidden" value="<?php echo $row['id']; ?>" class="form-control">

<div class="form-group row col-12">
<div class="col-sm-4">
<label>Role Name</label>
<input name="name" type="text" value="<?php echo $row['name']; ?>" class="form-control">
</div>
<div style="margin-top: 3%;" class="col-sm-4 mt-10">    
<label class="checkbox">active</label>
<input  type="checkbox" value="active" <?php if($row['active'] == 'active'){ echo 'checked';} ?> name="active">
</div>
</div>


</div>

<div class="row">
<div style="margin-top: 2%;" class="col-md-4">
    <a  name="cancel" class="link-delete"  href="articles.php?do=delete">Cancel</a>
    <input style="margin-bottom: 1%;padding-right:15%;padding-left: 15%;" type="submit" name="submit" class="btn btn-primary"/>

</div>

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
} elseif($do == "update"){ 
    
   if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

 $roleid = $_POST['id']; 
 $update_name = strip_tags($_POST['name']);
 $update_active = $_POST['active'];

    if(isset($_POST['active'])){

    $stmt_update = $con->prepare("UPDATE roles SET 
    name = ?, active = ? WHERE id = ?");
    $stmt_update->execute(array($update_name, $update_active, $roleid));
        
        
 }elseif(!isset($_POST['active'])){
    $update_inactive = "inactive";
     $stmt_update = $con->prepare("UPDATE roles SET
    name = ?, active = ? WHERE id = ?");
    $stmt_update->execute(array($update_name, $update_inactive, $roleid));

            }

   header("location:role.php");
   ?>


 <?php
} else{
    echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  

}
} elseif($do == "delete"){
    try {
        $roleid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt = $con ->prepare("select * from roles where id = ? limit 1 ");
        $stmt->execute(array($roleid));
        $count = $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        
        if ($stmt->rowCount() > 0) {	
        $stmt = $con->prepare("delete from roles where id = :zroleid ");
        $stmt->bindParam(":zroleid" , $roleid);	
        $stmt->execute();
        header ('location:role.php') ;
            
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


<?PHP
include("includes/home-down.php");

}else{
    header("location:index.php");
}

?>