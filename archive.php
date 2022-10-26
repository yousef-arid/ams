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
            <div class="d-flex align-items-center flex-wrap mr-2">

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Archive</h5>


<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>




<form action="archive.php" method="POST">
<div class="row">

<div class="col-md-3">
<div class="d-flex align-items-center" id="search">
<div class="input-group input-group-sm input-group-solid">
<input style="background-color: #ECE4E4;" type="text" class="form-control" id="search" placeholder="Search...">
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

<div class="subheader-separator subheader-separator-ver mt-2 mb-2 ml-5 mr-5 bg-gray-200"></div>

<div class="col-md-3">
<div class="d-flex align-items-center" id="kt_subheader_search2">
<div class="input-group input-group-sm input-group-solid">
<input type="date" name="date" class="form-control"/>
</div>
<input  type="submit" class="btn btn-primary" value="search" name="submit"/>

</div>
</div>

<div class="subheader-separator subheader-separator-ver mt-2 mb-2 ml-5 mr-5 bg-gray-200"></div>

</div>
</form>


</div>




        </div>

            <br>

            <div style="margin-left: 1%; margin-right: 1%; border:solid 1px ;font-weight: bold;" class="data-field">

            <div style="padding-left: 1%; padding-bottom:2%" class="row"> 

            <!-- start loop -->
            <?php
             if(isset($_POST['submit'])){

                $stmt_datetime =  $con->prepare("SELECT * FROM lblarticles");
                $stmt_datetime->execute();
                $rows_datetime = $stmt_datetime->fetchAll();
                 foreach($rows_datetime as $row_datetime){
                
                    $datetime = $row_datetime['publicate_date'];
                    $createDate = new DateTime($datetime);
                    $strip = $createDate->format('Y-m-d');
 


$date_day = $_POST['date'];
$stmt_loop = $con->prepare("SELECT * FROM lblarticles WHERE $strip = '".$date_day."'");
$stmt_loop->execute();
$rows = $stmt_loop->fetchAll();
$count = $stmt_loop->rowCount();

if($strip == $date_day){ ?>
    <div id="" style="background-color:white;margin-top:1%;" class="col-md-4">
                <div class="form-group">				    
            <div class="post-article">
            <div class="card-body"> 
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Pic-->
                    <?php if($row_datetime['section'] == 'libans' ) { ?>
                    <div style="background-color: #3699ff;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>
                    <?php }elseif($row_datetime['section'] == 'culture'){ ?>
                        <div style="background-color: #B91AF0;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>
                    <?php } elseif($row_datetime['section'] == 'sports'){ ?>

                        <div style="background-color: #060606;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>

<?php }else{ ?>

    <div style="background-color: #0FE80F;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>

 <?php } ?>
                <?php 
$stmt_time =  $con->prepare("SELECT * FROM lblarticles where DATE(publicate_date) = '".date("Y-m-d A")."' and id = '".$row_datetime['id']."' ");
$stmt_time->execute();
$rows_time = $stmt_time->fetchAll(); 
foreach($rows_time as $row_time){
$getdate = $row_time['publicate_date'];
$dt = new DateTime($getdate);
$time = $dt->format('H:i:s A');
  date_default_timezone_set("Asia/Riyadh");
 $current_time  = date('H:i:s A');
  if($time > $current_time){
   echo '<div style="background-color: #EA2727;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">';
   echo '<span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline">schedule</span>';
   echo '</div>';
  }

}

        ?>
                    <div class="card-toolbar mb-2">

                        <a  id="ContentPlaceHolder1_rptArticle_lnbEdit_0" class="btn btn-clean  btn-sm btn-icon" href="articles.php?do=edit&id=<?php  echo $row_datetime['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a  onclick="return confirm('Êtes-Vous Sure De Supprimer Cet Article?');" id="ContentPlaceHolder1_rptArticle_lnbDelete_0" class="btn btn-clean  btn-sm btn-icon" href="articles.php?do=delete&id=<?php  echo $row_datetime['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column mr-auto">
                        <div  class="d-flex flex-column mr-auto">
                        <!-- <h1 ><?php // echo $row_datetime['id']; ?></h1> -->
                            <a style="color: #343a40;text-decoration: none;" id="lnbArticle" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1" href="Preview/8126" target="_blank"><?php echo $row_datetime['title']; ?></a>
                            <span class="text-muted font-weight-bold">Author: <?php echo $row_datetime['author']; ?></span>
                            <span class="text-muted font-weight-bold">Created by: <?php echo $_SESSION['username']; ?></span>
                        </div>
                    </div>
                    </div>

                <div class="d-flex mb-2 align-items-cente"></div>
                <div class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Booked by:
            </span>
                    <span href="#" class="text-danger font-weight-bold">Georges Haddad</span>
                </div>

                <div style="font-size: 90%;" class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Date of publication:</span>
                    <span class="text-muted font-weight-bold Date"><?php echo $row_datetime['publicate_date']; ?></span>
                </div>
                <div class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Last modification:</span>
                    <a href="#" class="text-primary font-weight-bold">Nada  Merhi 2022-09-12 02:24 AM</a>
                </div>
                <div id="ContentPlaceHolder1_rptArticle_Transfer_0" class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Transfer:</span>
                    <div class="input-group input-group-sm input-group-solid">
                        <select name="ctl00$ContentPlaceHolder1$rptArticle$ctl00$ddlTransfer" id="ContentPlaceHolder1_rptArticle_ddlTransfer_0" class="form-control">
            <?php
            $stmt_transfer_to = $con->prepare("select * from roles");
            $stmt_transfer_to->execute();
            $rows_transfer_to = $stmt_transfer_to->fetchAll();
            foreach($rows_transfer_to as $row_transfer_to){
            ?>
<option  value="<?php echo $row_transfer_to['name']; ?>"><?php echo $row_transfer_to['name']; ?></option>
          <?php  } ?>
                    </select>
                                <a id="ContentPlaceHolder1_rptArticle_lnbTransfer_0" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$rptArticle$ctl00$lnbTransfer','')"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!--end::Description-->
                        <?php

                 if($row_datetime['custom_field'] == 'urgent'){
                  echo  '<a type="button" value="Urgent" class="btn btn-danger form-control"/>Urgent</a>';
                    }
                        ?>
                        <a style="margin-top: 1%;" type="button" class="btn btn-info form-control">Public</a>
                    </div>
            </div>

                </div>
            </div> 
<?php
}
}

// if($strip != $date_day){
// echo "<span style='color:red;margin-left:1%;margin-top:1%;'>No data available</span>";
    
//     }

            ?>

          <?php
       

        } 
        
        ?>



</div>

            </div>


<?php }  ?>


<!-- Footer -->
<?php  include("includes/footer.php"); ?>
<!-- End of Footer -->

    </div>

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