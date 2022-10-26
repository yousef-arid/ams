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
                                                    <?php   date_default_timezone_set("Asia/Riyadh");

                                                    $stmt = $con->prepare("SELECT * FROM lblarticles where userid = '".$_SESSION['id']."' ");
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
                            </div>

        </div>


<?php } ?>


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