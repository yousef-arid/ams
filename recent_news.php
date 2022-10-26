<?PHP
ob_start();
session_start();
include("functions.php");
include("includes/config.php");
if(isset($_SESSION['username'])){
    
// condition ? true : false
$do = isset($_GET['do']) ? $_GET['do'] : 'recent_news.php?do=add';
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
if($do == "recent_news.php"){ ?>




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
                    <h5 style="margin-left: 1%;">Recent-News</h5>
                </div>

            </div>

            <br>

            

<div style="background-color:white; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
       
        <div style="padding-left: 1%; padding-top:1%;" class="row">
            <div class="col-md-9">
                <div class="page-title-box">
                    <h5 class="page-title">Manage Recent-News</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>

        <form action="?do=insert" method="post" enctype="multipart/form-data">

        <div style="padding-left: 1%; padding-bottom:2%" class="row"> 

            <div class="col-md-11">
                <label  class="page-title">Title</label>
                <input type="text" class="form-control" value="" name="title">
                <div class="clearfix"></div>              
			</div>
                    
            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Description</label>
                <textarea id="description" name="description" rows="4" cols="50">
                </textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Source</label>
                <input type="text" class="form-control" value="" name="source">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Link Wetransfer for videos</label>
                <input type="text" class="form-control" value="" name="link">
            </div>



            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download main image</label>
                <br>
                <input type="file" class="" id="postimage" name="main-image">
                            
            </div>


            <div style="margin-top: 2%;" class="col-md-4">
	             <div class="form-group">				    
                     <label class="label-add-user">Transfer to*</label>
                     <select class="form-control" name="transfer">
                         <option>Forward item to</option>      
                     </select>
                 </div>
             </div>

             <div  class="col-md-4">
	        
             </div>

        <div style="margin-top: 2%;" class="col-md-5">
            <a  name="cancel" class="link-delete"  href="articles.php?do=delete">Cancel</a>
            <input style="margin-bottom: 1%;padding-right:15%;padding-left: 15%;" type="submit" name="submit" class="btn btn-primary"/>

        </div>

        </div>
        </form>
                  
        </div>

        

<?php } elseif($do == "insert"){  
// if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){  
if(isset($_POST['submit'])){

$title = strip_tags($_POST['title']);
$description = strip_tags($_POST['description']);
$source = strip_tags($_POST['source']);
$link = strip_tags($_POST['link']);
//start main image
$image_name = $_FILES['main-image']['name'];
$image_type = $_FILES['main-image']['type'];
$image_temp = $_FILES['main-image']['tmp_name'];
$image_size = $_FILES['main-image']['size'];
$allowed_extentions = array("jpg","png","jpeg","gif");
$image_explode = explode(".",$image_name);
$image_extention = strtolower(end($image_explode));
$in_array = in_array($image_extention,$allowed_extentions);
//end main page
$transfer_to = strip_tags($_POST['transfer']);

    
$formerror = array() ;

if(empty($title)) {
	$formerror[] = "Please enter the title!";
}

if(empty($description)) {
	$formerror[] = "Please enter the description!";
}

if(empty($source)) {
	$formerror[] = "Please enter the source!";
}

if(empty($link)) {
	$formerror[] = "Please enter the link!";
}

//  uploaded files
if(empty($image_name) && ! in_array($image_extention, $allowed_extentions)) {
	$formerror[] = "Extentions image not founded !";	
}  
// end uploadded files

if(empty($transfer_to)) {
	$formerror[] = "Please enter the transfer!";
}

foreach($formerror as $error) {
	echo("<div class='alert alert-danger'>" . $error . "</div>");	
	}
    /// ffffffff

    if(empty($formerror)){

$stmt_insert = $con->prepare("INSERT INTO recent_news 
(title,description,source,link,image,transfer)
VALUES (:ztitle, :zdescription, :zsource, :zlink, :zimage, :ztransfer)");



$stmt_insert->execute(array(
'ztitle' => $title,
'zdescription' => $description,
'zsource' => $source,
'zlink' => $link,
'zimage' => $image_name,
'ztransfer' => $transfer_to,
));

    }
  header("location:recent_news.php?do=add");
  
    ?>
 
  <?php 
}else{
  echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  
}
} elseif($do == "edit"){   ?>
    


<?php } elseif($do == "update"){ 
    
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){ ?>



<?php } else{
    echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  

}
} elseif($do == "delete"){



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

ob_end_flush();

?>