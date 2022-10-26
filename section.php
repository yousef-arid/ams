<?PHP
ob_start();
session_start();
include("functions.php");
include("includes/config.php");
if(isset($_SESSION['username'])){
    
// condition ? true : false
$do = isset($_GET['do']) ? $_GET['do'] : 'section';
$pagetitle = "Home";

 

?>


<?php include("includes/home-top.php") ?>
    
<?php  include("includes/leftsidebar.php"); ?>

    <div id="content-wrapper" class="d-flex flex-column">
    
        <div id="content">
                
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

        <?php
if($do == "section"){ ?>

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
                <h3 style="margin-left: 1%;">Section</h3>
            </div>

            <br>

            <!-- start table  -->
            <!-- <div class="container-fluid"> -->
                <div style="background-color: white;" class="information-table">
            <div style="padding-left: 1%; padding-top:1%;" class="row">
                                <div class="col-md-9">
                                    <div class="page-title-box">
                                        <h4 class="page-title">section List</h4>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="section.php?do=add">
                                    
                                        <button id="addToTable" class="btn btn-primary"><i class="fas fa-plus" ></i> New Record </button>
                                    </a>
                                </div>
                            </div>

                             <br><hr>

                            <div style="margin-left: 5%;" class="row">
                                <div class="col-md-11">

    <div class="demo-box m-t-20">
    <div class="table-responsive">                        
    <table id="example" class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">PUBLISHED</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php 
                                                    $stmt = $con->prepare("select * from  section");
                                                     $stmt->execute();
                                                    $rows = $stmt->fetchAll();
                                            
                                                    foreach($rows as $row){
                                                    ?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td style="padding-left: 50px;"><?php
      if ($row['status'] == 'published'){echo "<i class='fas fa-check'></i>";} ?></td>
      <td>

      <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="section.php?do=edit&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Edit</a>
                <a href="section.php?do=delete&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Delete</a>
                
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
                    <h5 style="margin-left: 1%;">Section</h5>
                </div>

            </div>

            <br>
  
            <div style="background-color:white; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
       
        <div style="padding-left: 1%; padding-top:1%;" class="row">
            <div class="col-md-9">
                <div class="page-title-box">
                    <h5 class="page-title">Manage article</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 


        <br>


        <form action="?do=insert" method="post" enctype="multipart/form-data">

        <div style="padding-left: 1%; padding-bottom:2%" class="row">

        <div class="col-md-5">
                <label  class="page-title">name</label>
                <input type="text" class="form-control" value="" name="name">
                <div class="clearfix"></div>              
			</div>

            <div class="col-md-7"></div>

            <div style="margin-top: 2%;" class="col-md-4">
            <a  name="cancel" class="link-delete"  href="articles.php?do=delete">Cancel</a>
            <input style="margin-bottom: 1%;padding-right:15%;padding-left: 15%;" type="submit" name="submit" class="btn btn-primary"/>

        </div>

        </div>
        </form>

        </div> 
        

<?php } elseif($do == "insert"){  

if(isset($_POST['submit'])){

    $name = strip_tags($_POST['name']);
    $formerror = array() ;

    if(empty($name)) {
        $formerror[] = "Please enter the name!";
    }

    foreach($formerror as $error) {
        echo("<div class='alert alert-danger'>" . $error . "</div>");	
        }

    if(empty($formerror)){

        $stmt_insert = $con->prepare("INSERT INTO section (name) VALUES (:zname)");

        $stmt_insert->execute(array(
        'zname' => $name,
     
        ));
        
            }
header("location:section.php");

}else{
  echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  
}

} elseif($do == "edit"){ 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $section_id = $_GET['id'];
        $stmt = $con->prepare("SELECT * FROM section WHERE id = ? LIMIT 1");
        $stmt->execute(array($section_id));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if($stmt->rowCount() > 0){
    ?>  
    
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
                    <h5 style="margin-left: 1%;">Section</h5>
                </div>

            </div>

            <br>


            <div style="background-color:white; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
       
        <div style="padding-left: 1%; padding-top:1%;" class="row">
            <div class="col-md-9">
                <div class="page-title-box">
                    <h5 class="page-title">Manage article</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>


        <form action="?do=update" method="post">
        <div style="padding-left: 1%; padding-bottom:2%" class="row"> 

        <input type="hidden" class="form-control" value="<?php echo $row['id']; ?>" name="id">             


        <div class="col-md-5">
                <label  class="page-title">Name</label>
                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name">
                <div class="clearfix"></div>              
			</div>

           <div class="col-md-7"></div>
            
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
} 
elseif($do == "update"){     
    
   if( $_SERVER['REQUEST_METHOD'] == 'POST' ){  
 $sectionid = $_POST['id']; 
 $name = strip_tags($_POST['name']);

 $stmt_update = $con->prepare("UPDATE section SET name = ?  WHERE id = ?");
 $stmt_update->execute(array($name, $sectionid));
    header("location:section.php");

 ?>



 
<?php } else{
    echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  

}
} elseif($do == "delete"){
    try {
        $section_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt = $con ->prepare("select * from section where id = ? limit 1 ");
        $stmt->execute(array($section_id));
        $count = $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        
        if ($stmt->rowCount() > 0) {	
        $stmt = $con->prepare("delete from section where id = :zsection ");
        $stmt->bindParam(":zsection" , $section_id);	
        $stmt->execute();
        header ('location:section.php') ;
            
        } else {
            echo 'This name does not exist' ;
        }
        header("location:section.php");
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