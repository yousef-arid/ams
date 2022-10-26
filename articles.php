<?PHP
ob_start();
session_start();
include("functions.php");
include("includes/config.php");
if(isset($_SESSION['username'])){
    
// condition ? true : false
$do = isset($_GET['do']) ? $_GET['do'] : 'articles';
$pagetitle = "Home";


?>


<?php include("includes/home-top.php"); ?>
    

<?php  include("includes/leftsidebar.php"); ?>



    <div id="content-wrapper" class="d-flex flex-column">
    
        <div  id="content">
                
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

        <?php
if($do == "articles"){ ?>

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
                <h3 style="margin-left: 1%;">Articles</h3>
            </div>

            <br>

            <!-- start table  -->
            <!-- <div class="container-fluid"> -->
                <div style="background-color: white;" class="information-table">
            <div style="padding-left: 1%; padding-top:1%;" class="row">
                                <div class="col-md-9">
                                    <div class="page-title-box">
                                        <h4 class="page-title">article List</h4>
                                        <div class="clearfix"></div>
                                     </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="articles.php?do=add">
                                    
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
                                                        <th>Title</th>
                                                        <th>Section</th>
                                                        <th>Departement</th>
                                                        <th>Date Of Creation</th>
                                                        <th>DATE OF PUBLICATION</th>
                                                        <th style="color: #007bff;">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $stmt = $con->prepare("select * from  lblarticles");
                                                    $stmt->execute();
                                                    $rows = $stmt->fetchAll();
                                            
                                                    foreach($rows as $row){
                                                    ?>
                                                    <tr>
                                                        <td><?php  echo $row["id"]; ?></td>
                                                        <td><?php  echo $row["title"]; ?></td>
                                                         <td><?php  echo $row["section"]; ?></td>
                                                        <td><?php  echo $row["transfer_to"]; ?></td>
                                                        <td><?php 
                                                        $date_c = $row["Date_Creation"];
                                                        $newDateTime = date('Y-m-d H:i:s A', strtotime($date_c));
                                                        echo  $newDateTime;
                                                           
                                                         ?>
                                                         </td>
                                                        <td><?php
                                                        $date_p = $row["publicate_date"];
                                                        $newDateTime = date('Y-m-d H:i:s A', strtotime($date_p));
                                                          echo $newDateTime; ?>
                                                          </td>
                                              
         <td>
 
       
                    <div class="dropdown"> 
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button> 
           <div  class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="articles.php?do=edit&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Edit</a>
                <a href="trash.php?do=delete&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Delete</a>
                
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
                    <h5 class="page-title">Manage article</h5>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 

        <br>

        <form action="?do=insert" method="post" enctype="multipart/form-data">

        <div style="padding-left: 1%; padding-bottom:2%" class="row"> 

            <div class="col-md-5">
	            <div class="form-group">				    
                    <label class="label-add-user">Section*</label>
                        <select name="section" class="form-control" name="section" required="">
                        <?php
                     $stmt_section = $con->prepare("select * from section");
                     $stmt_section->execute();
                     $rows = $stmt_section->fetchAll();
                     foreach($rows as $row){
                    ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>  
                            <?php } ?>   
                        </select>    
                </div>
            </div>

            <div class="col-md-5">
                <label  class="page-title">rubric</label>
                <input onfocus="this.placeholder=''" onblur="this.placeholder='Enter the rubric'" placeholder="Enter  rubric" type="text" class="form-control" value="" name="rubric">
                <div class="clearfix"></div>              
			</div>
                    
            <div style="margin-top: 2%;" class="col-md-5">
                <label class="label-add-user">Comments</label>
                <textarea  id="w3review" name="comment" rows="4" cols="50">
                </textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Author</label>
                <input onfocus="this.placeholder=''" onblur="this.placeholder='Enter Author'" placeholder="Enter Author" type="text" class="form-control" value="" name="author">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Title</label>
                <input type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Enter Title'" placeholder="Enter Title" class="form-control" value="" name="title">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Focus keywords (SEO)*</label>
                <input type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Focus keywords (SEO)'" placeholder="Focus keywords (SEO)" class="form-control" value="" name="seo">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Hat</label>
                <textarea id="hat" type="text" class="form-control" value="" name="hat"></textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Body of the article*</label>
                <textarea id="body-article" type="text" class="form-control" value="" name="b-article"></textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <button type="submit" name="sauvgarde-momentanée" class="">momentary save</button>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Link Wetransfer for videos</label>
                <input type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Enter link video'" placeholder="Enter link video" class="form-control" value="" name="video">
            </div>


            <div style="margin-top: 2%;" class="col-md-5">
                <label class="label-add-user">Download main image</label>
                <br>
                <input type="file" class="" id="postimage" name="main-image">
                            
            </div>

            <div style="margin-top: 2%;" class="col-md-5">
                <br>
                <input type="button" value="download media" class="" id="telecharge" name="telecharge">
                            
            </div>



            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download slide images</label>
                <br>
                <input type="file" class="" id="postimage" multiple="multiple" name="slide-image[]">
                            
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download files</label>
                <br>
                <input type="file" class=""  multiple="multiple"  id="postimage" name="files[]">
            </div>

            <div style="margin-top: 2%;" class="col-md-4">
              <label>Custom fields</label>
              <div class="form-group">
	               <input type="checkbox" id="actice" name="social[]" value="whastapp"> 
                  <span style="color: #12bc7e; font-weight:bold 2px;">Whastapp</span>
	          </div>
	          <div class="form-group">
	              <input type="checkbox" id="actice" name="social[]" value="instagram">
                  <span style="color: #833ab4; font-weight:bold 2px;">Instagram</span>
	         </div>
	        </div>

            <div style="margin-top: 4%;" class="col-md-4">
                <div class="form-group">
	                <input type="checkbox" id="actice" name="social[]" value="urgent">
                    <span style="color: #d90909; font-weight:bold 2px;">Urgent</span>
	            </div>
	            <div class="form-group">
	                 <input type="checkbox" id="actice" name="social[]" value="broadcast">
                     <span style="color: #77d632; font-weight:bold 2px;">Broadcast</span>   
	            </div>
	         </div>

             <div style="margin-top: 4%;" class="col-md-4">
                   <div class="form-group">
	                  <input type="checkbox" id="actice" name="social[]" value="slide">
                     <span style="color: #3275ab; font-weight:bold 2px;">Slide</span> 
	             </div>
	             <div class="form-group">
	                 <input type="checkbox" id="actice" name="social[]" value="cartouche">
                     <span style="color: #9a5004; font-weight:bold 2px;">Cartouche</span>
	            </div>  
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Facebook/Twitter quotes*</label>
                <textarea id="f-b-quotes" type="text" class="form-control" value="" name="quotes" required></textarea>
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

            <div style="margin-top: 5%;" class="col-md-4">
                <label class="label-add-user">To be reviewed by:</label> 
            </div>

            <div style="margin-top: 2%;" class="col-md-4">
                <label class="label-add-user">Publication date*</label>
                <input type="datetime-local" name="date" id="ContentPlaceHolder1_txtDate" class="form-control">
            </div>

        <dziv style="margin-top: 2%;" class="col-md-4">
            <a  name="cancel" class="link-delete"  href="articles.php?do=delete">Cancel</a>
            <input style="margin-bottom: 1%;padding-right:15%;padding-left: 15%;" type="submit" name="submit" class="btn btn-primary"/>

        </dziv>

        </div>
        </form>
                  
        </div>

        

<?php } elseif($do == "insert"){  
// if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){  
if(isset($_POST['submit'])){

$section = strip_tags($_POST['section']);
$rubric = strip_tags($_POST['rubric']);
$comments = strip_tags($_POST['comment']);
$author = strip_tags($_POST['author']);
$title = strip_tags($_POST['title']);
$seo = strip_tags($_POST['seo']); 
$hat = strip_tags($_POST['hat']);
$article = strip_tags($_POST['b-article']);
$videos = strip_tags($_POST['video']);
//start main image
$image_name = $_FILES['main-image']['name'];
$image_type = $_FILES['main-image']['type'];
$image_temp = $_FILES['main-image']['tmp_name'];
$image_size = $_FILES['main-image']['size'];
$allowed_extentions = array("jpg","png","jpeg","gif");
$image_explode = explode(".",$image_name);
$image_extention = strtolower(end($image_explode));
$in_array = in_array($image_extention,$allowed_extentions);
move_uploaded_file($image_temp,"upload_image/".$image_name);
//end main page

// start slide image
$images_name = $_FILES['slide-image']['name'];
$images_type = $_FILES['slide-image']['type'];
$images_temp = $_FILES['slide-image']['tmp_name'];
$images_size = $_FILES['slide-image']['size'];
$images_count = count($images_name);
// end slide image

//start files
$files_name = $_FILES['files']['name'];
$files_type = $_FILES['files']['type'];
$files_temp = $_FILES['files']['tmp_name'];
$files_size = $_FILES['files']['size'];
$files_count = count($files_name);
//end files

$all_custom_field = implode(",",$_POST['social']);
$quotes = strip_tags($_POST['quotes']);
$transfer_to = strip_tags($_POST['transfer']);
$date = $_POST['date'];

    
$formerror = array() ;

if(empty($section)) {
	$formerror[] = "Please enter the section!";
}

if(empty($rubric)) {
	$formerror[] = "Please enter the rubric!";
}

if(empty($comments)) {
	$formerror[] = "Please enter the comments!";
}

if(empty($author)) {
	$formerror[] = "Please enter the author!";
}

if(empty($title)) {
	$formerror[] = "Please enter the title!";
}

if(empty($seo)) {
	$formerror[] = "Please enter the seo!";
}

// if(empty($hat)) {
// 	$formerror[] = "Please enter the hat!";
// }

// if(empty($article)) {
// 	$formerror[] = "Please enter the article!";
// }

if(empty($videos)) {
	$formerror[] = "Please enter the videos!";
}
//  uploaded files
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

for($i = 0 ; $i < $files_count ; $i++){ 
    $files_explode = explode(".",$files_name[$i]);
    $files_extention[$i] = strtolower(end($files_explode));
    if(empty($files_name[$i]) && ! in_array($files_extention[$i], $allowed_extentions)) {
        $formerror[] = "Extentions files not founded !";	
    }
}


// end uploadded files

if(empty($all_custom_field)) {
	$formerror[] = "Please choose your filds!";
}

// if(empty($quotes)) {
// 	$formerror[] = "Please enter the quotes!";
// }

if(empty($transfer_to)) {
	$formerror[] = "Please enter the transfer!";
} 

if(empty($date)) {
	$formerror[] = "Please enter the date!";
}

foreach($formerror as $error) {
	echo("<div class='alert alert-danger'>" . $error . "</div>");	
	}
    /// ffffffff

    if(empty($formerror)){
$userid = $_SESSION['id'];

$stmt_insert = $con->prepare("INSERT INTO lblarticles 
(section,rubric,comments,author,title,seo,hat,article,videos,main_image,slide_images,files,custom_field,quotes,transfer_to,Date_Creation,publicate_date,userid)
VALUES (:zsection, :zrubric, :zcomments, :zauthor, :ztitle, :zseo, :zhat, :zarticle, :zvideos, :zmain_image, :zslide_images, :zfiles, :zcustom_field, :zquotes, :ztransfer_to, :zDate_Creation, :zpublicate_date, :zuserid)");

 date_default_timezone_set("Asia/Riyadh");

$stmt_insert->execute(array(
'zsection' => $section,
'zrubric' => $rubric,
'zcomments' => $comments,
'zauthor' => $author,
'ztitle' => $title,
'zseo' => $seo,
'zhat' => $hat,
'zarticle' => $article,
'zvideos' => $videos,
'zmain_image' => $image_name,
'zslide_images' => implode(",",$images_name),
'zfiles' => implode(",",$files_name),
'zcustom_field' => $all_custom_field,
'zquotes' => $quotes,
'ztransfer_to' => $transfer_to,
'zDate_Creation' => date('d-m-y h:i:s'),
'zpublicate_date' => $date,
'zuserid'=> $userid,
));

    }

header("location:articles.php");

    ?>
 
 

  <?php 
}else{
  echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  
}
} elseif($do == "edit"){   
    
    ?>

<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])){
$article_id = $_GET['id'];
$stmt = $con->prepare("SELECT * FROM lblarticles WHERE id = ? LIMIT 1");
$stmt->execute(array($article_id));
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
                    <h5 style="margin-left: 1%;">Articles</h5>
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

        <form action="?do=update" method="post" enctype="multipart/form-data">

        <div style="padding-left: 1%; padding-bottom:2%" class="row"> 

                <input type="hidden" class="form-control" value="<?php echo $row['id']; ?>" name="id">             

            <div class="col-md-5">
	            <div class="form-group">				    
                    <label class="label-add-user">Section*</label>
                   <?php
  
?>
                        <select name="section" class="form-control" name="section" required="">
                           
                        <?php


                        $id =  $_GET['id']; 
                        
                     $stmt_section = $con->prepare("select * from lblarticles");
                     $stmt_section->execute();
                     $rows_section = $stmt_section->fetchAll();
                     $selected = "selected";
                     foreach($rows_section as $row_section){
                    ?>
                            <option value="<?php  echo $row_section['section']; ?>"<?php if($row_section['id'] == $id){
                                echo 'selected="selected"';
                             } ?>><?php echo $row_section['section']; ?></option>     
                           

                           
                            <?php  } 
                            
                            ?>
                        </select>
                </div>
            </div>

            <div class="col-md-5">
                <label  class="page-title">rubric</label>
                <input type="text" class="form-control" value="<?php echo $row['rubric']; ?>" name="rubric">
                <div class="clearfix"></div>              
			</div>
                    
            <div style="margin-top: 2%;" class="col-md-5">
                <label class="label-add-user">Comments</label>
                <textarea id="w3review"  name="comment" rows="4" cols="50"><?php echo $row['comments']; ?></textarea>
               
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Author</label>
                <input type="text" class="form-control" value="<?php echo $row['author']; ?>" name="author">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Title</label>
                <input type="text" class="form-control" value="<?php echo $row['title']; ?>" name="title">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Focus keywords (SEO)*</label>
                <input type="text" class="form-control" value="<?php echo $row['seo']; ?>" name="seo">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Hat</label>
                <textarea id="hat" type="text" class="form-control" name="hat"><?php echo $row['hat']; ?></textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Body of the article*</label>
                <textarea id="body-article" type="text" class="form-control" name="b-article"><?php echo $row['article']; ?></textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <button type="submit" name="sauvgarde-momentanée" class="">momentary save</button>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Link Wetransfer for videos</label>
                <input type="text" class="form-control" value="<?php echo $row['videos']; ?>" name="video">
            </div>

           <?php
           $id = $_GET['id'];
$stmt_image = $con->prepare("select * from lblarticles where id = '".$id."'");
$stmt_image->execute();
$rows_image = $stmt_image->fetch();
// $rows_image_count = $stmt_image->rowCount();

    if($rows_image['main_image'] == ''){ ?>

<div style="margin-top: 2%;" class="col-md-5">
                <label class="label-add-user">Download main image</label>
                 <br>
                <input type="file"   value="" class="" id="postimage" name="image-edit">
            </div>
<?php }else{ ?>

    <?php // if($rows_image_count > 0){  ?>
            <div style="margin-top: 2%;" class="col-md-5">
                <label class="label-add-user">Download main image</label>
                 <br>
                <input type="file"   value="" class="" id="postimage" name="main-image">
                <p id="main-p">main picture</p>
                <img id="img-show" width="220" height="220" src="upload_image/<?php echo $row['main_image']; ?>"/>
                <a id="download" href="upload_image/<?php echo $row['main_image']; ?>?id=<?php echo $row['id']; ?>" download><i class="fa-solid fa-download"></i></a>
                <a id="remove"  href="articles.php?do=remove&id=<?php  echo $row['id']; ?>" onclick="hide_data()" name="remove" ><i name="link" class="fa fa-times remove-image" aria-hidden="true"></i></a>
            </div>

            <div style="margin-top: 2%;" class="col-md-5">
                <br>
                <input  type="button"  value="Download media" class="" id="media" name="media">
                <br><br>
                <p id="title-p">Title of image</p>
                <input name="image-edit" id="title-input" value="<?php echo $row['main_image']; ?>" class="form-control"/>
                <p id="title-p1">Legend</p>
                <textarea id="title-text" class="form-control"></textarea>
                <p id="title-p2">Description</p>
                <input id="title-input1" class="form-control"/>
            </div>

<?php } ?>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download slide images</label>
                <br>
                <input type="file" class="" value="<?php echo $row['slide_images']; ?>" id="postimage" multiple="multiple" name="edit-slide-image[]">
                            
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download files</label>
                <br>
                <input type="file" class="" value="<?php echo $row['files']; ?>" multiple="multiple"  id="postimage" name="edit-files[]">
            </div>
<?php
$social = $row['custom_field'];
$social1= explode(",",$social);
?>
            <div style="margin-top: 2%;" class="col-md-4">
              <label>Custom fields</label>
              <div class="form-group">
	               <input type="checkbox" id="actice" name="social[]" value="Whastapp"
                   <?php 
                   if(in_array('whastapp', $social1)){
                    echo 'checked';
                   }
                   ?>> 
                  <span style="color: #12bc7e; font-weight:bold 2px;">Whastapp</span>
	          </div>
	          <div class="form-group">
	              <input type="checkbox" id="actice" name="social[]" value="instagram"
                  <?php 
                   if(in_array('instagram', $social1)){
                    echo 'checked';
                   }
                   ?>
                  >
                  <span style="color: #833ab4; font-weight:bold 2px;">Instagram</span>
	         </div>
	        </div>

            <div style="margin-top: 4%;" class="col-md-4">
                <div class="form-group">
	                <input type="checkbox" id="actice" name="social[]" value="urgent"
                    <?php 
                   if(in_array('urgent', $social1)){
                    echo 'checked';
                   }
                   ?>
                    >
                    <span style="color: #d90909; font-weight:bold 2px;">Urgent</span>
	            </div>
	            <div class="form-group">
	                 <input type="checkbox" id="actice" name="social[]" value="broadcast"
                     <?php 
                   if(in_array('broadcast', $social1)){
                    echo 'checked';
                   }
                   ?>
                     >
                     <span style="color: #77d632; font-weight:bold 2px;">Broadcast</span>   
	            </div>
	         </div>

             <div style="margin-top: 4%;" class="col-md-4">
                   <div class="form-group">
	                  <input type="checkbox" id="actice" name="social[]" value="slide"
                      <?php 
                   if(in_array('slide', $social1)){
                    echo 'checked';
                   }
                   ?>
                      >
                     <span style="color: #3275ab; font-weight:bold 2px;">Slide</span> 
	             </div>
	             <div class="form-group">
	                 <input type="checkbox" id="actice" name="social[]" value="cartouche"
                     <?php 
                   if(in_array('cartouche', $social1)){
                    echo 'checked';
                   }
                   ?>
                     >
                     <span style="color: #9a5004; font-weight:bold 2px;">Cartouche</span>
	            </div>  
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Facebook/Twitter quotes*</label>
                <textarea id="f-b-quotes" type="text" class="form-control" name="quotes" required><?php echo $row['quotes'] ?></textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-3">
	             <div class="form-group">				    
                     <label class="label-add-user">Transfer to*</label>
                     <select name="transfer" class="form-control"  required="">
                           
                        <?php
                        $id =  $_GET['id']; 


                        $stmt_section_departement = $con->prepare("select * from roles");
$stmt_section_departement->execute();
$rows_section_departement = $stmt_section_departement->fetchAll();

foreach($rows_section_departement as $row_section_departement){       

                        
                     $stmt_section = $con->prepare("select * from lblarticles where id = '".$id."'");
                     $stmt_section->execute();
                     $rows_section = $stmt_section->fetchAll();
                     $selected = "selected";
                     foreach($rows_section as $row_section){
                    ?>
                    <option value="<?php  echo $row_section_departement['name']; ?>"><?php  echo $row_section_departement['name']; ?></option>
                    <?php  } ?>

                            <option value="<?php  echo $row_section['transfer_to']; ?>"<?php if($row_section['id'] == $id){
                                echo 'selected="selected"';
                             } ?>><?php echo $row_section['transfer_to']; ?></option>     
                            <?php  }   ?>
                            
                        </select>
                 </div>
             </div>

            <div style="margin-top: 5%;" class="col-md-4">
                <label class="label-add-user">To be reviewed by:</label> 
            </div>

            <div style="margin-top: 2%;" class="col-md-4">
                <label class="label-add-user">Publication date*</label>
                <input type="datetime-local" name="date" value="<?php echo $date ; ?>" id="ContentPlaceHolder1_txtDate" class="form-control">
            </div>

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

 $articleid = $_POST['id']; 
 $section = strip_tags($_POST['section']);
 $rubric = strip_tags($_POST['rubric']);
 $comments = strip_tags($_POST['comment']);
 $author = strip_tags($_POST['author']);
 $title = strip_tags($_POST['title']);
 $seo = strip_tags($_POST['seo']);
 $hat = strip_tags($_POST['hat']);
 $article = strip_tags($_POST['b-article']);
 $videos = strip_tags($_POST['video']);
//start main image
$image_name = $_FILES['image-edit']['name'];
$image_type = $_FILES['image-edit']['type'];
$image_temp = $_FILES['image-edit']['tmp_name'];
$image_size = $_FILES['image-edit']['size'];
$allowed_extentions = array("jpg","png","jpeg","gif");
$image_explode = explode(".",$image_name);
$image_extention = strtolower(end($image_explode));
$in_array = in_array($image_extention,$allowed_extentions);
//end main page

// start slide image
$images_name = $_FILES['edit-slide-image']['name'];
$images_type = $_FILES['edit-slide-image']['type'];
$images_temp = $_FILES['edit-slide-image']['tmp_name'];
$images_size = $_FILES['edit-slide-image']['size'];
$images_count = count($images_name);
// end slide image

//start files
$files_name = $_FILES['edit-files']['name'];
$files_type = $_FILES['edit-files']['type'];
$files_temp = $_FILES['edit-files']['tmp_name'];
$files_size = $_FILES['edit-files']['size'];
$files_count = count($files_name);
//end files
$edit_image = strip_tags($_POST['image-edit']);
 $all_custom_field = implode(",",$_POST['social']);
 $quotes = strip_tags($_POST['quotes']);
 $transfer_to = strip_tags($_POST['transfer']);
 $date = $_POST['date'];
 


$stmt_update = $con->prepare("UPDATE lblarticles SET 
section = ?, rubric = ?, comments = ?, author = ?, title = ?, seo = ?, hat = ?, article = ?, videos = ?, main_image = ?, slide_images = ?, files = ?, custom_field = ?, quotes = ?, transfer_to = ?, publicate_date = ? WHERE id = ?");
$stmt_update->execute(array($section, $rubric, $comments, $author, $title, $seo, $hat, $article, $videos, $image_name, implode(",",$images_name), implode(",",$files_name), $all_custom_field,  $quotes, $transfer_to, $date, $articleid));
   header("location:articles.php");
   ?>



 <?php
} else{
    echo "<h1 style='background-color:red;color:white;text-align:center;'>Sorry you cany brows this page directly</h1>";  

}
} elseif($do == "delete"){
    try {
        $articleid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt_select = $con ->prepare("select * from lblarticles where id = ? limit 1 ");
        $stmt_select->execute(array($articleid));
        $count = $stmt_select->rowCount();
        $rows_select = $stmt_select->fetch();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        
        if ($stmt->rowCount() > 0) {	

        $stmt_insert = $con->prepare("INSERT INTO trash where id = :zarticleid ");


        $stmt_delete = $con->prepare("delete from lblarticles where id = :zarticleid ");
        $stmt_delete->bindParam(":zarticleid" , $articleid);	
        $stmt_delete->execute();


        header ('location:articles.php') ;
            
        } else {
            echo 'This name does not exist' ;
        }
} elseif($do = 'remove'){

 try {
        $articleid_remove = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt_select_remove = $con ->prepare("select * from lblarticles where id = ? limit 1 ");
        $stmt_select_remove->execute(array($articleid_remove));
        $count = $stmt_select_remove->rowCount();
        $rows_select_remove = $stmt_select_remove->fetch();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        if ($stmt_select_remove->rowCount() > 0) {	
            $id = $rows_select_remove['id'];
           $remove_section =  $rows_select_remove['section'];
           $remove_rubric =  $rows_select_remove['rubric'];
           $remove_comments =  $rows_select_remove['comments'];
           $remove_author =  $rows_select_remove['author'];
           $remove_title =  $rows_select_remove['title'];
           $remove_seo =  $rows_select_remove['seo'];
           $remove_hat =  $rows_select_remove['hat'];
           $remove_article =  $rows_select_remove['article'];
           $remove_videos =  $rows_select_remove['videos'];
           $remove_slide_images =  $rows_select_remove['slide_images'];
           $remove_files =  $rows_select_remove['files'];
           $remove_custom_field =  $rows_select_remove['custom_field'];
           $remove_quotes =  $rows_select_remove['quotes'];
           $remove_transfer_to =  $rows_select_remove['transfer_to'];
           $remove_Date_Creation =  $rows_select_remove['Date_Creation'];
           $remove_publicate_date =  $rows_select_remove['publicate_date'];
           $remove_userid =  $rows_select_remove['userid'];

           $stmt_update = $con->prepare("UPDATE lblarticles SET 
section = ?, rubric = ?, comments = ?, author = ?, title = ?, seo = ?, hat = ?, article = ?, videos = ?, main_image = ?, slide_images = ?, files = ?, custom_field = ?, quotes = ?, transfer_to = ?, Date_Creation = ?, publicate_date = ? WHERE id = ?");
$stmt_update->execute(array($remove_section, $remove_rubric, $remove_comments,
 $remove_author, $remove_title, $remove_seo, 
 $remove_hat,$remove_article, $remove_videos,
  '', $remove_slide_images, $remove_files,
  $remove_custom_field,  $remove_quotes, $remove_transfer_to,
   $remove_Date_Creation, $remove_publicate_date, $articleid_remove));
   header("location:articles.php");
           
        }

}
?>


<!-- Footer -->
<?php  include("includes/footer.php"); ?>
<!-- End of Footer -->

    </div>
  
        <!--dddddd End of Content Wrapper -->

<!-- </div> -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


<?PHP
include("includes/home-down.php");

}else{
    header("location:index.php");
}

?>