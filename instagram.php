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

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Instagram</h5>


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

<div style="background-color:white;padding-left:1%;  margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">
            <h5 style="margin-left: 1%;color:black;font-weight:bold;" class="title-h3">Manage Instagram</h5>
            <!-- <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div> -->
                <form action="?do=insert" method="post" enctype="multipart/form-data">
                <div style="background-color:white;padding-left:1%; margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">

                <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Title</label>
                                <input type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Enter the title'" placeholder="Enter the title" class="form-control" value="" name="title">
                            </div>
                        </div>

                <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Date de publication*</label>
                                <input name="date" type="datetime-local" id="ContentPlaceHolder1_txtDate" width="100%" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 1</label>
                            </div>
                            <div class="col-md-11">
                                <textarea onfocus="this.placeholder=''" onblur="this.placeholder='Enter first post'" placeholder="Enter first post" name="post1" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 2</label>
                                <textarea onfocus="this.placeholder=''" onblur="this.placeholder='Enter second post'" placeholder="Enter second post" name="post2" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 3</label>
                                <textarea name="post3" onfocus="this.placeholder=''" onblur="this.placeholder='Enter third post'" placeholder="Enter third post" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 4</label>
                                <textarea onfocus="this.placeholder=''" onblur="this.placeholder='Enter 4th post'" placeholder="Enter 4th post" name="post4" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 5</label>
                                <textarea name="post5" onfocus="this.placeholder=''" onblur="this.placeholder='Enter 5th post'" placeholder="Enter 5th post" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 6</label>
                                <textarea name="post6" onfocus="this.placeholder=''" onblur="this.placeholder='Enter 6th post'" placeholder="Enter 6th post" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 7</label>
                                <textarea onfocus="this.placeholder=''" onblur="this.placeholder='Enter 7th post'" placeholder="Enter 7th post" name="post7" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 8</label>
                                <textarea onfocus="this.placeholder=''" onblur="this.placeholder='Enter 8th post'" placeholder="Enter 8th post" name="post8" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Post 9</label>
                                <textarea name="post9" onfocus="this.placeholder=''" onblur="this.placeholder='Enter 9th post'" placeholder="Enter 9th post" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Author</label>
                                <textarea onfocus="this.placeholder=''" onblur="this.placeholder='Enter Auther'" placeholder="Enter Author" name="author" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Download main image</label>
                            </div>
                            <div class="col-md-4">
                                <input type="file" class="form-control" id="postimage" name="main-image">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11">
                                <label class="label-add-user">Download pictures</label>
                            </div>
                            <div class="col-md-4">
                                <input  multiple="multiple" type="file" class="form-control" id="postimage" name="gallery[]">
                            </div>
                        </div>


                        <div class="col-md-6">
	                        <div class="form-group">				    
                                <label class="label-add-user">Transferer à*</label>
                                <select class="form-control" name="transfer">
                                    <option>Transférer l'article à</option>
                                    <option>Transférer l'article b</option>
                                </select>
                            </div>
                        </div>


                        </div>

        <div style="margin-top: 2%;" class="col-md-4">
            <a  name="cancel" class="link-delete"  href="articles.php?do=delete">Cancel</a>
            <input style="margin-bottom: 1%;padding-right:15%;padding-left: 15%;" type="submit" name="submit" class="btn btn-primary"/>

        </div>

                </form>
     </div>

<?php }elseif($do == "insert"){  
  
if(isset($_POST['submit'])){

    $title = strip_tags($_POST['title']);
    $date = strip_tags($_POST['date']);
    $post1 = strip_tags($_POST['post1']);
    $post2 = strip_tags($_POST['post2']);
    $post3 = strip_tags($_POST['post3']);
    $post4 = strip_tags($_POST['post5']);
    $post5 = strip_tags($_POST['post5']);
    $post6 = strip_tags($_POST['post6']);
    $post7 = strip_tags($_POST['post7']);
    $post8 = strip_tags($_POST['post8']);
    $post9 = strip_tags($_POST['post9']);
    $author = strip_tags($_POST['author']);
// image 
$image_name = $_FILES['main-image']['name'];
$image_type = $_FILES['main-image']['type'];
$image_temp = $_FILES['main-image']['tmp_name'];
$image_size = $_FILES['main-image']['size'];
$allowed_extentions = array("jpg","png","jpeg","gif");
$image_explode = explode(".",$image_name);
$image_extention = strtolower(end($image_explode));
$in_array = in_array($image_extention,$allowed_extentions);
//gallery
$images_name = $_FILES['gallery']['name'];
$images_type = $_FILES['gallery']['type'];
$images_temp = $_FILES['gallery']['tmp_name'];
$images_size = $_FILES['gallery']['size'];
$images_count = count($images_name);
// $images_name = $_FILES['gallery-image']['name'];
// $images_type = $_FILES['gallery-image']['type'];
// $images_temp = $_FILES['gallery-image']['tmp_name'];
// $images_size = $_FILES['gallery-image']['size'];
// $images_count = count($images_name);

$transfer_to = strip_tags($_POST['transfer']);

$formerror = array() ;


if(empty($title)) {
	$formerror[] = "Please enter the title!";
}

if(empty($date)) {
	$formerror[] = "Please enter the date!";
}

if(empty($post1)) {
	$formerror[] = "Please enter the post1!";
}

if(empty($post2)) {
	$formerror[] = "Please enter the post2!";
}

if(empty($post3)) {
	$formerror[] = "Please enter the post3!";
}

if(empty($post4)) {
	$formerror[] = "Please enter the post4!";
}

if(empty($post5)) {
	$formerror[] = "Please enter the post5!";
}

if(empty($post6)) {
	$formerror[] = "Please enter the post6!";
}

if(empty($post7)) {
	$formerror[] = "Please enter the post7!";
}

if(empty($post8)) {
	$formerror[] = "Please enter the post8!";
}

if(empty($post9)) {
	$formerror[] = "Please enter the post9!";
}

if(empty($author)) {
	$formerror[] = "Please enter the author!";
}

if(empty($image_name) && ! in_array($image_extention, $allowed_extentions)) {
	$formerror[] = "Extentions image not founded !";	
} 

for($i = 0 ; $i < $images_count ; $i++){ 
    $images_explode = explode(".",$images_name[$i]);
    $images_extention[$i] = strtolower(end($images_explode));
    $images_explode = explode(".",$images_name[$i]);
    if(empty($images_name[$i]) && ! in_array($images_extention[$i], $allowed_extentions)) {
        $formerror[] = "Extentions images not founded !";	
    }  
}

if(empty($transfer_to)) {
	$formerror[] = "Please enter the transfer!";
}

foreach($formerror as $error) {
	echo("<div class='alert alert-danger'>" . $error . "</div>");	
	}


    if(empty($formerror)){

        $stmt_insert = $con->prepare("INSERT INTO instagram 
        (title,date,post1,post2,post3,post4,post5,post6,post7,post8,post9,author,main_image,gallery,transfer_to)
        VALUES (:ztitle, :zdate, :zpost1, :zpost2, :zpost3, :zpost4, :zpost5, :zpost6, :zpost7, :zpost8, :zpost9, :zauthor, :zmain_image, :zgallery, :ztransfer_to)");
        
        $stmt_insert->execute(array(
        'ztitle' => $title,
        'zdate' => $date,
        'zpost1' => $post1,
        'zpost2' => $post2,
        'zpost3' => $post3,
        'zpost4' => $post4,
        'zpost5' => $post5,
        'zpost6' => $post6,
        'zpost7' => $post7,
        'zpost8' => $post8,
        'zpost9' => $post9,
        'zauthor' => $author,
        'zmain_image' => $image_name,
        'zgallery' => implode(",",$images_name),
        'ztransfer_to' => $transfer_to,
        ));
        
            }
            header("location:instagram.php");

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