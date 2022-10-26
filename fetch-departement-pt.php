<?php
session_start();
include("includes/config.php");
date_default_timezone_set("Asia/Riyadh");

?>

 





<?php
if(isset($_POST['request']) && $_POST['request'] !== 'Sort by departement'){ ?>
 <div class="container">
             <div id="result" style="padding-left: 2%; padding-bottom:2%;" class="row"> 

<?php
$stmt_datetime =  $con->prepare("SELECT * FROM lblarticles");
$stmt_datetime->execute();
$rows_datetime = $stmt_datetime->fetchAll();
 foreach($rows_datetime as $row_datetime){

    
    $get_publication_date= $row_datetime["publicate_date"];
    $publication_date = date('Y-m-d', strtotime($get_publication_date));

    $get_publication_time = $row_datetime["publicate_date"];
    $publication_time = date('H:i:s a', strtotime($get_publication_time));

    $date_now = date(("Y-m-d"));
   $time_now = date(("H:i:s a"));

   if($publication_date == $date_now && $publication_time > $time_now && $row_datetime['transfer_to'] == $_POST['request'] || $publication_date > $date_now && $row_datetime['transfer_to'] == $_POST['request']){

            ?>

             <div id="" style="background-color:white;margin-top:1%;margin-left:7px;width:350px;" >
                <div class="form-group">

            <div class="post-article">
           
<form method="post" action="?do=update">
            <div class="card-body"> 
                <div class="d-flex align-items-center">
                    <input name="id" type="hidden"  value="<?php  echo $row_datetime['id']; ?>"/>
                    <?php  if($row_datetime['section'] == 'libans' ) { ?>
                     <div style="background-color: #3699ff;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>  
                    <?php  }elseif($row_datetime['section'] == 'culture'){ ?>
                        <div style="background-color: #B91AF0;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>
                    <?php  } elseif($row_datetime['section'] == 'sports'){ ?>

                        <div style="background-color: #060606;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>

<?php  }else{ ?>

    <div style="background-color: #0FE80F;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>

 <?php  } ?>

                    <div class="card-toolbar mb-2">
                        <a  id="font_edit" class="btn btn-clean  btn-sm btn-icon" href="articles.php?do=edit&id=<?php  echo $row_datetime['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a id="font_delete" onclick="return confirm('Are you sure to delete article');"  class="btn btn-clean  btn-sm btn-icon" href="articles-day.php?do=delete&id=<?php  echo $row_datetime['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column mr-auto">
                        <div  class="d-flex flex-column mr-auto">
                         <h1 ><?php  echo $row_datetime['id']; ?></h1>
                             <a style="color: #343a40;text-decoration: none;" id="lnbArticle" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1" href="Preview/8126" target="_blank"><?php echo $row_datetime['title']; ?></a>
                            <span class="text-muted font-weight-bold">Author: <?php  echo $row_datetime['author']; ?></span>
                            <span class="text-muted font-weight-bold">Created by: <?php  echo $_SESSION['username']; ?></span>
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
                    <span class="text-muted font-weight-bold Date">
                        <?php
                          $date_p = $row_datetime['publicate_date'];
                          $newDateTime = date('Y-m-d H:i:s A', strtotime($date_p));
                          echo $newDateTime;
                       ?>
                      </span>
                </div>
                <div class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Last modification:</span>
                    <a href="#" class="text-primary font-weight-bold"> 
                    <?php
                  $stmt_user = $con->prepare("select * from tbladmin where id = '".$row_datetime['userid']."'");
                  $stmt_user->execute();
                  $rows_user= $stmt_user->fetch();
                    ?>
                     <?php  echo $rows_user['AdminUserName']; ?>
                    <?php  echo $row_datetime['title'] . " " . $row_datetime['publicate_date'] ; ?></a>
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
<option  value="<?php  echo $row_transfer_to['name']; ?>"><?php echo $row_transfer_to['name']; ?></option>
          <?php  } ?> 
                    </select>
                    <button id="transfer-to" type="submit" name="submit" class="confirm"><i class="fas fa-arrow-right arrow-color"></i></button>

                            </div>
                        </div> 

                        <?php

                 if($row_datetime['custom_field'] == 'urgent'){
                  echo  '<a style="color:white;" type="button" value="Urgent" class="btn btn-danger form-control"/>Urgent</a>';
                    }
                        ?>
                        <a style="margin-top: 1%;color:white;" type="button" class="btn btn-info form-control"><?php echo $row_datetime['transfer_to']; ?></a>
                    </div>

                   
                </form>

                

            </div>

                </div>
            </div>
           
 <!-- end loop -->
   
<?php 
   }
}
?>
</div>
   </div>
 <?php }elseif(isset($_POST['request']) && $_POST['request'] == 'Sort by departement'){ ?>
 <div class="container">
             <div id="result" style="padding-left: 2%; padding-bottom:2%;" class="row"> 

<?php
$stmt_datetime =  $con->prepare("SELECT * FROM lblarticles");
$stmt_datetime->execute();
$rows_datetime = $stmt_datetime->fetchAll();
 foreach($rows_datetime as $row_datetime){

    
    $get_publication_date= $row_datetime["publicate_date"];
    $publication_date = date('Y-m-d', strtotime($get_publication_date));

    $get_publication_time = $row_datetime["publicate_date"];
    $publication_time = date('H:i:s a', strtotime($get_publication_time));

    $date_now = date(("Y-m-d"));
   $time_now = date(("H:i:s a"));

   if($publication_date == $date_now && $publication_time > $time_now && $_POST['request'] == 'Sort by departement' || $publication_date > $date_now && $_POST['request'] == 'Sort by departement'){

            ?>

             <div id="" style="background-color:white;margin-top:1%;margin-left:7px;width:350px;" >
                <div class="form-group">

            <div class="post-article">
           
<form method="post" action="?do=update">
            <div class="card-body"> 
                <div class="d-flex align-items-center">
                    <input name="id" type="hidden"  value="<?php  echo $row_datetime['id']; ?>"/>
                    <?php  if($row_datetime['section'] == 'libans' ) { ?>
                     <div style="background-color: #3699ff;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>  
                    <?php  }elseif($row_datetime['section'] == 'culture'){ ?>
                        <div style="background-color: #B91AF0;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>
                    <?php  } elseif($row_datetime['section'] == 'sports'){ ?>

                        <div style="background-color: #060606;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>

<?php  }else{ ?>

    <div style="background-color: #0FE80F;color:white;border-radius:3px;padding: 1px 7px 1px 7px;font-size:12px;" class="d-flex flex-column mr-auto mb-2">
                        <span id="ContentPlaceHolder1_rptArticle_section_0" class="label label-primary label-inline"><?php echo $row_datetime['section']; ?></span>
                    </div>

 <?php  } ?>

                    <div class="card-toolbar mb-2">
                        <a  id="font_edit" class="btn btn-clean  btn-sm btn-icon" href="articles.php?do=edit&id=<?php  echo $row_datetime['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a id="font_delete" onclick="return confirm('Are you sure to delete article');"  class="btn btn-clean  btn-sm btn-icon" href="articles-day.php?do=delete&id=<?php  echo $row_datetime['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column mr-auto">
                        <div  class="d-flex flex-column mr-auto">
                         <h1 ><?php  echo $row_datetime['id']; ?></h1>
                             <a style="color: #343a40;text-decoration: none;" id="lnbArticle" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1" href="Preview/8126" target="_blank"><?php echo $row_datetime['title']; ?></a>
                            <span class="text-muted font-weight-bold">Author: <?php  echo $row_datetime['author']; ?></span>
                            <span class="text-muted font-weight-bold">Created by: <?php  echo $_SESSION['username']; ?></span>
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
                    <span class="text-muted font-weight-bold Date">
                        <?php
                          $date_p = $row_datetime['publicate_date'];
                          $newDateTime = date('Y-m-d H:i:s A', strtotime($date_p));
                          echo $newDateTime;
                       ?>
                      </span>
                </div>
                <div class="d-flex mb-2 align-items-cente">
                    <span class="text-dark-75 font-weight-bolder mr-2">Last modification:</span>
                    <a href="#" class="text-primary font-weight-bold"> 
                    <?php
                  $stmt_user = $con->prepare("select * from tbladmin where id = '".$row_datetime['userid']."'");
                  $stmt_user->execute();
                  $rows_user= $stmt_user->fetch();
                    ?>
                     <?php  echo $rows_user['AdminUserName']; ?>
                    <?php  echo $row_datetime['title'] . " " . $row_datetime['publicate_date'] ; ?></a>
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
<option  value="<?php  echo $row_transfer_to['name']; ?>"><?php echo $row_transfer_to['name']; ?></option>
          <?php  } ?> 
                    </select>
                    <button id="transfer-to" type="submit" name="submit" class="confirm"><i class="fas fa-arrow-right arrow-color"></i></button>

                            </div>
                        </div> 

                        <?php

                 if($row_datetime['custom_field'] == 'urgent'){
                  echo  '<a style="color:white;" type="button" value="Urgent" class="btn btn-danger form-control"/>Urgent</a>';
                    }
                        ?>
                        <a style="margin-top: 1%;color:white;" type="button" class="btn btn-info form-control"><?php echo $row_datetime['transfer_to']; ?></a>
                    </div>

                   
                </form>

                

            </div>

                </div>
            </div>
           
 <!-- end loop -->
   
<?php 
   }
}
?>
</div>
   </div>
 <?php } 

