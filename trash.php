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
                <h3 style="margin-left: 1%;">Trash</h3>
            </div>

            <br>

            <!-- start table  -->
            <!-- <div class="container-fluid"> -->
                <div style="background-color: white;" class="information-table">
            <div style="padding-left: 1%; padding-top:1%;" class="row">
                                <div class="col-md-9">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Trash Posts</h4>
                                        <div class="clearfix"></div>
                                     </div>
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
                                                        <th>Departement</th>
                                                        <th>Date of Creation</th>
                                                        <th>Date of publication</th>
                                                        <th style="color: #007bff;">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $stmt = $con->prepare("select * from  trash");
                                                    $stmt->execute();
                                                    $rows = $stmt->fetchAll();
                                            
                                                    foreach($rows as $row){
                                                    ?>
                                                    <tr>
                                                        <td><?php  echo $row["id"]; ?></td>
                                                        <td><?php  echo $row["title"]; ?></td>
                                                        <td><?php  echo $row["transfer_to"]; ?></td>
                                                        <td><?php  echo $row["Date_Creation"]; ?></td>
                                                        <td><?php  echo $row["publicate_date"]; ?></td>
                                                        <td>
                                                    
                                                         <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button> 
             <div class="dropdown-menu" aria-labelledby="dropdownMenu2"> 
                <a href="trash.php?do=restore&id=<?php  echo $row['id']; ?>" class="dropdown-item" type="button">Restore</a>
                <!-- <a href="articles.php?do=delete&id=<?php // echo $row['id']; ?>" class="dropdown-item" type="button">Delete</a> -->
                
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

        </div>


<?php  
} elseif($do == "delete"){
    try {
        $articleid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt_select = $con ->prepare("select * from lblarticles where id = '".$articleid."' ");
        $stmt_select->execute();
        $fetch = $stmt_select->fetch();
        $count = $stmt_select->rowCount();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        
        if ($stmt_select->rowCount() > 0) {
       
date_default_timezone_set("Asia/Riyadh");
$stmt_insert = $con->prepare("INSERT INTO trash 
(section,rubric,comments,author,title,seo,hat,article,videos,main_image,slide_images,files,custom_field,quotes,transfer_to,Date_Creation,publicate_date)
VALUES (:zsection, :zrubric, :zcomments, :zauthor, :ztitle, :zseo, :zhat, :zarticle, :zvideos, :zmain_image, :zslide_images, :zfiles, :zcustom_field, :zquotes, :ztransfer_to, :zDate_Creation, :zpublicate_date)");

$stmt_insert->execute(array(
    'zsection' => $fetch['section'],
    'zrubric' => $fetch['rubric'],
    'zcomments' => $fetch['comments'],
    'zauthor' => $fetch['author'],
    'ztitle' => $fetch['title'],
    'zseo' => $fetch['seo'],
    'zhat' => $fetch['hat'],
    'zarticle' => $fetch['article'],
    'zvideos' => $fetch['videos'],
    'zmain_image' => $fetch['main_image'],
    'zslide_images' => $fetch['slide_images'],
    'zfiles' => $fetch['files'],
    'zcustom_field' => $fetch['custom_field'],
    'zquotes' => $fetch['quotes'],
    'ztransfer_to' => $fetch['transfer_to'],
    'zDate_Creation' => $fetch['Date_Creation'],
    'zpublicate_date' => $fetch['publicate_date'],
    ));      
    
        $stmt = $con->prepare("delete from lblarticles where id = :zarticleid ");
        $stmt->bindParam(":zarticleid" , $articleid);	
        $stmt->execute();
        header ('location:articles.php') ;
            
        } else {
            echo 'This name does not exist' ;
        }
}elseif($do = "restore"){

    try {
        $article_trashed_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;	
        $stmt_select_trash = $con ->prepare("select * from trash where id = '".$article_trashed_id."' ");
        $stmt_select_trash->execute();
        $fetch_trash = $stmt_select_trash->fetch();
        $count_trash = $stmt_select_trash->rowCount();
        } catch (PDOException $e) {
            echo 'Failed : ' . $e->getMessage(); ;
        }	
        if ($count_trash > 0) {
            $userid = $_SESSION['id'];
            date_default_timezone_set("Asia/Riyadh");
$stmt_insert_trash = $con->prepare("INSERT INTO lblarticles 
(section,rubric,comments,author,title,seo,hat,article,videos,main_image,slide_images,files,custom_field,quotes,transfer_to,Date_Creation,publicate_date,userid )
VALUES (:zsection, :zrubric, :zcomments, :zauthor, :ztitle, :zseo, :zhat, :zarticle, :zvideos, :zmain_image, :zslide_images, :zfiles, :zcustom_field, :zquotes, :ztransfer_to, :zDate_Creation, :zpublicate_date,:zuserid )");

$stmt_insert_trash->execute(array(
    'zsection' => $fetch_trash['section'],
    'zrubric' => $fetch_trash['rubric'],
    'zcomments' => $fetch_trash['comments'],
    'zauthor' => $fetch_trash['author'],
    'ztitle' => $fetch_trash['title'],
    'zseo' => $fetch_trash['seo'],
    'zhat' => $fetch_trash['hat'],
    'zarticle' => $fetch_trash['article'],
    'zvideos' => $fetch_trash['videos'],
    'zmain_image' => $fetch_trash['main_image'],
    'zslide_images' => $fetch_trash['slide_images'],
    'zfiles' => $fetch_trash['files'],
    'zcustom_field' => $fetch_trash['custom_field'],
    'zquotes' => $fetch_trash['quotes'],
    'ztransfer_to' => $fetch_trash['transfer_to'],
    'zDate_Creation' => $fetch_trash['Date_Creation'],
    'zpublicate_date' => $fetch_trash['publicate_date'],
    'zuserid' => $userid,
    )); 

    $stmt_delete_trash = $con->prepare("delete from trash where id = :zarticleid ");
    $stmt_delete_trash->bindParam(":zarticleid" , $article_trashed_id);	
    $stmt_delete_trash->execute();
    header ('location:trash.php') ;

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


<?PHP
include("includes/home-down.php");

}else{
    header("location:index.php");
}

?>