<?PHP
ob_start();
session_start();
include("functions.php");
include("includes/config.php");
if(isset($_SESSION['username'])){
    
// condition ? true : false
$do = isset($_GET['do']) ? $_GET['do'] : 'instagram';
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
if($do == "instagram"){ ?>

<div style="background-color: white;" class="top-title">
                <div  style="margin-left: 1%;" class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                    <span ><?php echo $_SESSION['username'] ; ?></span>
                    </span>
                    <span class="symbol symbol-35 symbol-light-primary font-size-h5 font-weight-bold">
                    <a  href="logout.php" style="color: #007bff;  text-decoration: none;" id="TopHeader_SignOut" href="javascript:__doPostBack('ctl00$TopHeader$SignOut','')">Sign Out</a>
                    </span>
                </div>
            <hr>
            <div style="margin-left: 2%;" class="d-flex align-items-center flex-wrap mr-2">

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Recent News</h5>


<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>

<div class="row">

<div class="col-md-4">
<div class="d-flex align-items-center" id="search">

<div class="input-group input-group-sm input-group-solid">
<input  type="text" class="form-control" id="search-input" placeholder="Search...">
<div style="background-color: #f8f9fa;" class="input-group-append">
<span class="input-group-text">
<span class="svg-icon">

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"></rect>
<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
</g>
</svg>

</span>

</span>
</div>
</div>

</div>
</div> 

<div class="subheader-separator subheader-separator-ver mt-2 mb-2 ml-5 mr-5 bg-gray-200"></div>

<div class="col-md-4"> 
<div class="d-flex align-items-center" id="kt_subheader_search2">
<div class="input-group input-group-sm input-group-solid">

<input  type="date" class="form-control" id="date-input">
 
</div>
</div>
</div>




</div>


<div class="d-flex align-items-center" id="">
<div class="input-group input-group-sm input-group-solid">
<input id="ContentPlaceHolder1_chkPublished" type="checkbox" name="hide published">
<label>Hide published</label>
</div>
</div>

<div style="margin-left:88%" class="d-flex align-items-center">

<a id="a_article" href="articles.php?do=add">Add Article</a>

</div>

</div>

        </div>
        
            <br>
            
             

            <div style="margin-left: 1%; margin-right: 1%;font-weight: bold;" class="data-field">

<div style="padding-left: 2%; padding-bottom:2%;" class="row"> 

<!-- start loop -->
<?php
$date_day = date("Y/m/d");
$stmt_loop = $con->prepare("SELECT * FROM news");
$stmt_loop->execute();
$rows = $stmt_loop->fetchAll();
$count = $stmt_loop->rowCount();
foreach($rows as $row){
if($count > 0){
   
?>

<div style="background-color:white;margin-top:1%;margin-left:7px;width:350px;" class="col-md-4">
    <div class="form-group">				    
<div class="post-article">
<div class="card-body"> 
    <!--begin::Info-->
    <div class="d-flex align-items-center">
        <!--begin::Pic-->
        <div  class="d-flex flex-column mr-auto mb-2">
            <span style="display:none;" id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline">section</span>
        </div>
        <!--end::Pic-->
        <!--begin::Toolbar-->
        <div class="card-toolbar mb-2">
 
                <!--begin::Navigation-->  
                <a  id="font_edit" class="btn btn-clean  btn-sm btn-icon" href="articles.php?do=edit&id=<?php  echo $row['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                <a id="font_delete" onclick="return confirm('Are you sure to delete article');"  class="btn btn-clean  btn-sm btn-icon" href="articles-day.php?do=delete&id=<?php  echo $row_datetime['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>

        </div>
        <!--end::Toolbar-->
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Pic-->
        <!--end::Pic-->
        <!--begin::Info-->
        <div class="d-flex flex-column mr-auto">
            <!--begin: Title-->
            <div  class="d-flex flex-column mr-auto">
                <a style="color: #343a40;text-decoration: none;" id="lnbArticle" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1" href="Preview/8126" target="_blank">Raï: For international cooperation on August 4</a>
                <span class="text-muted font-weight-bold">Created by: <?php echo $_SESSION['username']; ?></span>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <!--end::Toolbar-->
        </div>
    <!--end::Info-->
    <!--begin::Description-->
    <div class="d-flex mb-2 align-items-cente"></div>
    <div class="d-flex mb-2 align-items-cente">
        <span class="text-dark-75 font-weight-bolder mr-2">Booked by:</span>
        <span href="#" class="text-danger font-weight-bold">Georges Haddad</span>
    </div>
    <div style="font-size: 90%;" class="d-flex mb-2 align-items-cente">
        <span class="text-dark-75 font-weight-bolder mr-2">Date of publication:</span>
        <span class="text-muted font-weight-bold Date"><?php // echo $row['publicate_date']; ?></span>
    </div>
    <div class="d-flex mb-2 align-items-cente">
        <span class="text-dark-75 font-weight-bolder mr-2">Last modification:</span>
        <a href="#" class="text-primary font-weight-bold">Nada  Merhi 2022-09-12 02:24 AM</a>
    </div>

        <div id="ContentPlaceHolder1_rptArticle_Transfer_0" class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Transfer:</span>
                    <div class="input-group input-group-sm input-group-solid">
                        <select id="select-transfer" name="transfer_to" class="form-control">
            <?php
            $stmt_transfer_to = $con->prepare("select * from roles");
            $stmt_transfer_to->execute();
            $rows_transfer_to = $stmt_transfer_to->fetchAll();
            foreach($rows_transfer_to as $row_transfer_to){
            ?> 
<option  value="<?php echo $row_transfer_to['name']; ?>"><?php echo $row_transfer_to['name']; ?></option>
          <?php  } ?>
                    </select>
                    <button id="transfer-to"  type="submit" name="submit" class="confirm"><i class="fas fa-arrow-right arrow-color"></i></button>

                    <!-- <a type="submit" name="submit" href="articles-day.php?do=update&id=<?php //  echo $row_datetime['id']; ?>"  class="btn btn-primary"></a> -->
                            </div>
                        </div> 
            <!--end::Description-->
            <input  type="button" value="public" class="btn btn-info form-control"/>
        </div>
</div>

    </div>
</div>

<!-- end loop -->
<?php }else{
        echo "<span style='color:red;margin-left:40%;margin-top:1%;'>No data available</span>";

} 

}
?>


</div>

</div>
                
        </div>
            <!-- End of Main Content -->
<?php 
} elseif($do == "add"){ ?>

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
            <div class="col-md-8">
                <div class="page-title-box">
                    <h5 class="page-title">Manage article</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>

        <form action="?do=insert" method="post" enctype="multipart/form-data">

        <div style="padding-left: 1%; padding-bottom:2%" class="row"> 

        <div class="col-md-8">
                <label  class="page-title">Title</label>
                <input onfocus="this.placeholder=''" onblur="this.placeholder='Enter the title'" placeholder="Enter  title" type="text" class="form-control" value="" name="title">
                <div class="clearfix"></div>              
			</div>

            <div style="margin-left: 4%;" class="col-md-3">
                <label  class="page-title">push-notification</label><br>
                <input  type="checkbox"  value="" name="notification">
                <label style="font-size: 12px;">Send by Push Notification</label>
                <div class="clearfix"></div>              
			</div>
                    

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Description</label>
                <textarea id="hat" type="text" class="form-control" value="" name="description"></textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Source</label>
                <input type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Enter source'" placeholder="Enter source" class="form-control" value="" name="source">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Link Wetransfer for videos</label>
                <input type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Enter link video'" placeholder="Enter link video" class="form-control" value="" name="video">
            </div>


            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download main image</label>
                <br>
                <input type="file" class="" id="postimage" name="main-image">
                            
            </div>


            <div style="margin-top: 2%;" class="col-md-3">
	             <div class="form-group">				    
                     <label class="label-add-user">Transfer to*</label>
                     <select class="form-control" name="transfer">
                     <?php
                     $stmt_transfer = $con->prepare("select * from roles");
                     $stmt_transfer->execute();
                     $rows_transfer = $stmt_transfer->fetchAll();
                     foreach($rows_transfer as $row_transfer){
                    ?>
                            <option value="<?php echo $row_transfer['name']; ?>"><?php echo $row_transfer['name']; ?></option>  
                            <?php } ?>
                     </select>
                 </div>
             </div>

             <div style="margin-top: 2%;" class="col-md-12"></div>

        <dziv style="margin-top: 2%;" class="col-md-4">
            <a  name="cancel" class="link-delete"  href="articles.php?do=delete">Cancel</a>
            <input style="margin-bottom: 1%;padding-right:15%;padding-left: 15%;" type="submit" name="submit" class="btn btn-primary"/>

        </dziv>

        </div>
        </form>
                  
        </div


<?php }elseif($do == "insert"){  
  
if(isset($_POST['submit'])){

    $title = strip_tags($_POST['title']);
    $notification = $_POST['notification'];
    $description = strip_tags($_POST['description']);
    $source = strip_tags($_POST['source']);
    $video = strip_tags($_POST['video']);
// image 
$image_name = $_FILES['main-image']['name'];
$image_type = $_FILES['main-image']['type'];
$image_temp = $_FILES['main-image']['tmp_name'];
$image_size = $_FILES['main-image']['size'];
$allowed_extentions = array("jpg","png","jpeg","gif");
$image_explode = explode(".",$image_name);
$image_extention = strtolower(end($image_explode));
$in_array = in_array($image_extention,$allowed_extentions);

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

if(empty($video)) {
	$formerror[] = "Please enter the video!";
}

if(empty($image_name) && ! in_array($image_extention, $allowed_extentions)) {
	$formerror[] = "Extentions image not founded !";	
} 

if(empty($transfer_to)) {
	$formerror[] = "Please enter the transfer!";
}

foreach($formerror as $error) {
	echo("<div class='alert alert-danger'>" . $error . "</div>");	
	}


    if(empty($formerror)){

        $stmt_insert = $con->prepare("INSERT INTO news 
        (title,notification,description,source,link,image,transfer)
        VALUES (:ztitle, :znotification, :zdescription, :zsource, :zvideo, :zmain_image, :ztransfer_to)");
        
        $stmt_insert->execute(array(
        'ztitle' => $title,
        'znotification' => $notification,
        'zdescription' => $description,
        'zsource' => $source,
        'zvideo' => $video,
        'zmain_image' => $image_name,
        'ztransfer_to' => $transfer_to,
        ));
        
            }
            header("location:recent-news.php");

}
} elseif($do == "edit"){   ?>
    

    

<?php } elseif($do == "update"){ 
    
//    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

//  $add = $_POST['id']; 
//  $section = strip_tags($_POST['title']);
//  $rubric = strip_tags($_POST['rubric']);
//  $comments = strip_tags($_POST['comment']);
//  $author = strip_tags($_POST['author']);
//  $title = strip_tags($_POST['title']);
//  $seo = strip_tags($_POST['seo']);
//  $hat = strip_tags($_POST['hat']);
//  $article = strip_tags($_POST['b-article']);
//  $videos = strip_tags($_POST['video']);
// //start main image
// $image_name = $_FILES['main-image']['name'];
// $image_type = $_FILES['main-image']['type'];
// $image_temp = $_FILES['main-image']['tmp_name'];
// $image_size = $_FILES['main-image']['size'];
// $allowed_extentions = array("jpg","png","jpeg","gif");
// $image_explode = explode(".",$image_name);
// $image_extention = strtolower(end($image_explode));
// $in_array = in_array($image_extention,$allowed_extentions);
// //end main page

// // start slide image
// $images_name = $_FILES['slide-image']['name'];
// $images_type = $_FILES['slide-image']['type'];
// $images_temp = $_FILES['slide-image']['tmp_name'];
// $images_size = $_FILES['slide-image']['size'];
// $images_count = count($images_name);
// // end slide image

// //start files
// $files_name = $_FILES['files']['name'];
// $files_type = $_FILES['files']['type'];
// $files_temp = $_FILES['files']['tmp_name'];
// $files_size = $_FILES['files']['size'];
// $files_count = count($files_name);
// //end files

//  $all_custom_field = implode(",",$_POST['social']);
//  $quotes = strip_tags($_POST['quotes']);
//  $transfer_to = strip_tags($_POST['transfer']);
//  $date = $_POST['date'];

 


// $stmt_update = $con->prepare("UPDATE lblarticles SET 
// section = ?, rubric = ?, comments = ?, author = ?, title = ?, seo = ?, hat = ?, article = ?, videos = ?, main_image = ?, slide_images = ?, files = ?, custom_field = ?, quotes = ?, transfer_to = ?, publicate_date = ? WHERE id = ?");
// $stmt_update->execute(array($section, $rubric, $comments, $author, $title, $seo, $hat, $article, $videos, $image_name, implode(",",$images_name), implode(",",$files_name), $all_custom_field,  $quotes, $transfer_to, $date, $articleid));
//    header("location:articles.php");
   ?>



 <?php
// } else{
//     echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  

// }
} elseif($do == "delete"){
    try {
        $articleid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt = $con ->prepare("select * from lblarticles where id = ? limit 1 ");
        $stmt->execute(array($articleid));
        $count = $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        
        if ($stmt->rowCount() > 0) {	
        $stmt = $con->prepare("delete from lblarticles where id = :zarticleid ");
        $stmt->bindParam(":zarticleid" , $articleid);	
        $stmt->execute();
        header ('location:articles.php') ;
            
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