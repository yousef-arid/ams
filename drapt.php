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


<?php include("includes/home-top.php") ?>
    
<?php  include("includes/leftsidebar.php"); ?>

    <div id="content-wrapper" class="d-flex flex-column">
    
        <div id="content">
                
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
          
 <div class="article-draft py-2 py-lg-4 article-draft-solid" id="article-draft">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

        <div class="d-flex align-items-center flex-wrap mr-1">

            <div class="d-flex align-items-baseline mr-5">

            <h5 class="text-dark font-weight-bold my-2 mr-5">Articles</h5>

            </div>


            <div class="article-draft-separator article-draft-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>


            <div class="d-flex align-items-center" id="article-draft">
                <div class="input-group input-group-sm input-group-solid">
                <input style="background-color: #EBF2F2;" type="text" class="form-control" id="search" placeholder="Search...">
                    <div class="input-group-append">
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

    </div>
</div>


            </div>

            <br>

            <!-- start table  -->
            <!-- <div class="container-fluid"> -->
      <div style="background-color: white;" class="information-table">
 <div style="padding-left: 1%; padding-top:1%;" class="row">
             <div class="col-md-9">
                     <div class="page-title-box">
                       <h4 class="page-title">Draft List</h4>
                        <div class="clearfix"></div>
                   </div>
                </div>
         </div>

                 <br><hr>

                 <div style="padding-left: 3%;" class="row">
                     <div class="col-md-11">

    <div class="demo-box m-t-20">
    <div class="table-responsive">  

                                <table id="example" class="table">
  <thead>
    <tr>
      <th scope="col">TITLE</th>
      <th scope="col">SECTION</th>
      <th scope="col">DATE CREATION</th>
      <th scope="col">DATE PUBLICATION</th>
      <th scope="col">DELETED</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php 
                                                    $stmt = $con->prepare("select * from  draft");
                                                     $stmt->execute();
                                                    $rows = $stmt->fetchAll();
                                            
                                                    foreach($rows as $row){
                                                    ?>
    <tr>
      <th scope="row"><?php echo $row['title']; ?></th>
      <td><?php echo $row['section']; ?></td>
      <td><?php echo $row['date_create']; ?></td>
      <td><?php echo $row['date_publicate']; ?></td>
      <td style="padding-left: 50px;"><?php
      if ($row['deleted'] == 'deleted'){echo "<h4>X</h4>";} ?></td>
      <td>
      <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="articles.php?do=edit&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Edit</a>
                <a href="articles.php?do=delete&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Delete</a>
                
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
                            <option>Veuillez s??lectionner une section</option>     
                        </select>
                </div>
            </div>

            <div class="col-md-5">
                <label  class="page-title">rubric</label>
                <input type="text" class="form-control" value="" name="rubric">
                <div class="clearfix"></div>              
			</div>
                    
            <div style="margin-top: 2%;" class="col-md-5">
                <label class="label-add-user">Comments</label>
                <textarea id="w3review" name="comment" rows="4" cols="50">
                </textarea>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Author</label>
                <input type="text" class="form-control" value="" name="author">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Title</label>
                <input type="text" class="form-control" value="" name="title">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user" >Focus keywords (SEO)*</label>
                <input type="text" class="form-control" value="" name="seo">
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
                <button type="submit" name="sauvgarde-momentan??e" class="">momentary save</button>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Link Wetransfer for videos</label>
                <input type="text" class="form-control" value="" name="video">
            </div>


            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download main image</label>
                <br>
                <input type="file" class="" id="postimage" name="main-image">
                            
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
                         <option>Forward item to</option>      
                     </select>
                 </div>
             </div>

            <div style="margin-top: 5%;" class="col-md-4">
                <label class="label-add-user">To be reviewed by:</label> 
            </div>

            <div style="margin-top: 2%;" class="col-md-4">
                <label class="label-add-user">Publication date*</label>
                <input type="date" name="date" id="ContentPlaceHolder1_txtDate" class="form-control">
            </div>

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

$section = strip_tags($_POST['title']);
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

if(empty($hat)) {
	$formerror[] = "Please enter the hat!";
}

if(empty($article)) {
	$formerror[] = "Please enter the article!";
}

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

if(empty($quotes)) {
	$formerror[] = "Please enter the quotes!";
}

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

$stmt_insert = $con->prepare("INSERT INTO lblarticles 
(section,rubric,comments,author,title,seo,hat,article,videos,main_image,slide_images,files,custom_field,quotes,transfer_to,publicate_date)
VALUES (:zsection, :zrubric, :zcomments, :zauthor, :ztitle, :zseo, :zhat, :zarticle, :zvideos, :zmain_image, :zslide_images, :zfiles, :zcustom_field, :zquotes, :ztransfer_to, :zpublicate_date)");



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
'zpublicate_date' => $date,
));

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
                        <select name="section" class="form-control" name="section" required="">
                            <option>Veuillez s??lectionner une section</option>     
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
                <button type="submit" name="sauvgarde-momentan??e" class="">momentary save</button>
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Link Wetransfer for videos</label>
                <input type="text" class="form-control" value="<?php echo $row['videos']; ?>" name="video">
            </div>


            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download main image</label>
                <br>
                <input type="file" value="<?php echo $row['main_image']; ?>" class="" id="postimage" name="main-image">
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download slide images</label>
                <br>
                <input type="file" class="" value="<?php echo $row['slide_images']; ?>" id="postimage" multiple="multiple" name="slide-image[]">
                            
            </div>

            <div style="margin-top: 2%;" class="col-md-11">
                <label class="label-add-user">Download files</label>
                <br>
                <input type="file" class="" value="<?php echo $row['files']; ?>" multiple="multiple"  id="postimage" name="files[]">
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
                     <select class="form-control" name="transfer">
                         <option>Forward item to</option>      
                     </select>
                 </div>
             </div>

            <div style="margin-top: 5%;" class="col-md-4">
                <label class="label-add-user">To be reviewed by:</label> 
            </div>

            <div style="margin-top: 2%;" class="col-md-4">
                <label class="label-add-user">Publication date*</label>
                <input type="date" name="date" value="<?php echo $date ; ?>" id="ContentPlaceHolder1_txtDate" class="form-control">
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
 $section = strip_tags($_POST['title']);
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
                        <span aria-hidden="true">??</span>
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