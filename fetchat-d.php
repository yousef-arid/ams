<?php
session_start();
include("includes/config.php");
?>

<?php
 
 

if(isset($_POST['request'])){
$request = $_POST['request'];


 $stmt_request =  $con->prepare("SELECT * FROM lblarticles where transfer_to = '".$request."'");
$stmt_request->execute();
$counts = $stmt_request->rowCount(); 
 $rows = $stmt_request->fetchAll();
 ?>
<div id="result" style="padding-left: 1%; padding-bottom:2%" class="row"> 

 <?php 
if($counts > 0){
 foreach($rows as $row){ 
    
     ?>

            <?php


            ?>
            <div id="" style="background-color:white;margin-top:1%;" class="col-md-4">
                <div class="form-group">				    
            <div class="post-article">
            <div class="card-body"> 
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Pic-->
                    <div style="background-color: #3699ff;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row['section']; ?></span>
                    </div>
                <?php 
$stmt_time =  $con->prepare("SELECT * FROM lblarticles where DATE(publicate_date) = '".date("Y-m-d A")."' and id = '".$row['id']."' ");
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
                            <a style="color: #343a40;text-decoration: none;" id="lnbArticle" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1" href="Preview/8126" target="_blank"><?php echo $row['title']; ?></a>
                            <span class="text-muted font-weight-bold">Author: <?php echo $row['author']; ?></span>
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
                    <span class="text-muted font-weight-bold Date"><?php echo $row['publicate_date']; ?></span>
                </div>
                <div class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Last modification:</span>
                    <a href="#" class="text-primary font-weight-bold">Nada  Merhi 2022-09-12 02:24 AM</a>
                </div>
                <div id="ContentPlaceHolder1_rptArticle_Transfer_0" class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Forward item:</span>
                    <div class="input-group input-group-sm input-group-solid">
                        <select name="ctl00$ContentPlaceHolder1$rptArticle$ctl00$ddlTransfer" id="ContentPlaceHolder1_rptArticle_ddlTransfer_0" class="form-control">
                <option selected="selected" value="0">Choose Department</option>
                <option value="2">Journalist</option>
                <option value="3">Chef</option>
                <option value="4">Editor</option>
                <option value="6">Final Cut</option>
                <option value="7">Social Media</option>
                <option value="8">Graphic Designer</option>

            </select>
                                <a id="ContentPlaceHolder1_rptArticle_lnbTransfer_0" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$rptArticle$ctl00$lnbTransfer','')"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <?php

                 if($row['custom_field'] == 'urgent'){
                  echo  '<a style="color:white;" type="button" value="Urgent" class="btn btn-danger form-control"/>Urgent</a>';
                    }
                        ?>
                        <a style="margin-top: 1%;color:white" type="button" class="btn btn-info form-control">Public</a>
                    </div>
            </div>

                </div>
            </div>

 <?php 
    
} 
}else{
    echo "<h1 style='color:red;'>There's no departement data founded in this name</h1>";
  }
?>
 </div>

 <?php } ?>
