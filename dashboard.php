<?php
  include("functions.php");
   include("includes/config.php");
session_start();
if(isset($_SESSION['username'])){
  
// condition ? true : false
$do = isset($_GET['do']) ? $_GET['do'] : 'dashboard';
$pagetitle = "Home";


?>

<?php include("includes/home-top.php") ?>
    

<?php  include("includes/leftsidebar.php"); ?>
 
        <div id="content-wrapper" class="d-flex flex-column">


<?php if($do == "dashboard"){ ?>
            <div id="content">
                
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

                <div class="container-fluid">

                <div style="margin-top: 1%;" class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
<span id="TopHeader_lblUsername"><?php echo $_SESSION['username'] ; ?></span>
</span>
<span class="symbol symbol-35 symbol-light-primary font-size-h5 font-weight-bold">
<a href="logout.php" style="color: #007bff;  text-decoration: none;" id="TopHeader_SignOut" href="javascript:__doPostBack('ctl00$TopHeader$SignOut','')">Sign Out</a>
</span>
</div>
                    <!-- Page Heading -->



  <div style="margin-top: 5%;" class="card card-img">

<div style="background-color: #E5EAEE;" class="card-header py-5">
<h1 class="font-weight-bolder">Bienvenue à</h1>
</div>

<img src="assets/images/logo3.jpeg">

<div style="background-color: #E5EAEE;" class="card-footer  py-5">
<h1 class="font-weight-bolder text-right">CMS</h1>
</div>
</div>
  
    </div>
</div>

<?php }  ?>
         



            <!-- Footer -->
         <?php  include("includes/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?PHP
}else{
    header("location:index.php");
}

?>